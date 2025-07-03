var router = new VueRouter({
    mode: 'history',
    routes: []
});

function getQueryParam(name){
    var params = new URLSearchParams(window.location.search);
    return params.get(name);
}

function slugify(str){
    return str.toString().toLowerCase()
        .replace(/\s+/g,'-')
        .replace(/[^\w-]+/g,'')
        .replace(/--+/g,'-')
        .replace(/^-+/, '')
        .replace(/-+$/, '');
}

function getSlugFromPath(){
    var match = window.location.pathname.match(/^\/date-([^\/]+)$/);
    return match ? match[1] : null;
}

// Remove the ref parameter from a query string and return the remaining
// search portion (including the leading '?') or an empty string if none remain
function stripRefFromSearch() {
    var params = new URLSearchParams(window.location.search);
    params.delete('ref');
    var s = params.toString();
    return s ? '?' + s : '';
}

var profiel= new Vue({
    router,
    el: "#profiel",
    created: function(){
        var id = this.$route && this.$route.query ? this.$route.query.id : null;
        if(!id){
            id = getQueryParam('id');
        }
        var slug = typeof profile_slug !== 'undefined' && profile_slug ? profile_slug : getSlugFromPath();
        if(1*id > 0){
            this.profile_id = 1*id;
            this.init();
        } else if(slug){
            this.profile_slug = slug;
            this.init();
        }
        console.log(this.profile_id, this.profile_slug);
    },
    data: {
        profile_id: 0,
        profile_slug: '',
        profile: { name : '',
                  city : '',
                  profile_image_big : '',
                  aboutme : '',
                  province : '',
                  relationship : '',
                  length : '',
                  url : '',
                 },

    },
    computed: {
    },
    methods:  {
        init: function(){
            if(this.profile_id <= 0 && !this.profile_slug){
                return;
            }
            let that= this;
            var url = api_url + this.profile_id;
            if(this.profile_slug && this.profile_id <= 0){
                url = api_url + '?slug=' + encodeURIComponent(this.profile_slug);
            }
            axios.get(url)
                .then(function(response){
                    that.profile = response.data.profile;
                    if(that.profile.profile_image_big && that.profile.profile_image_big.indexOf('no_img_Vrouw.jpg') !== -1){
                        that.profile.profile_image_big = 'img/fallback.svg';
                    }
                    var slug = slugify(that.profile.name || '');
                    if(slug){
                        var newUrl = '/date-' + slug + stripRefFromSearch();
                        var link = document.querySelector('link[rel=canonical]');
                        if(link){
                            link.setAttribute('href', 'https://18date.net' + newUrl);
                        }
                        document.title = 'Date ' + that.profile.name;
                        history.replaceState({}, '', newUrl);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        imgError: function(event){
            event.target.src = 'img/fallback.svg';
        }
    }
});

// Track clicks on the "Stuur gratis bericht" button and
// ensure the event is sent before navigating away
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('send-msg-btn');
    if (!btn) return;

    btn.addEventListener('click', function(e) {
        if (window.gtag) {
            e.preventDefault(); // wacht met navigeren
            gtag('event', 'send_free_message_click', {
                'event_category': 'Profile',
                'event_label': 'Stuur gratis bericht',
                'event_callback': function() {
                    window.location.href = btn.href;
                }
            });
        }
    });
});
