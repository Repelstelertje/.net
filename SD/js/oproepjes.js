function slugify(str){
    return str.toString().toLowerCase()
        .replace(/\s+/g,'-')
        .replace(/[^\w-]+/g,'')
        .replace(/--+/g,'-')
        .replace(/^-+/, '')
        .replace(/-+$/, '');
}

function createOproepjes(el, apiUrl){
    return new Vue({
        el: el,
        created: function(){
            this.init();
        },
        data: {
            profiles: [],
            page: 1,
            ppp: 20,    //profiles per page
            api_url: apiUrl,
            dataError: false
        },
    computed: {
        filtered_profiles: function(){
            //afhankelijk van pagina nummer, een deel vd profielen tonen
            //alleen hier tellen we vanaf 0
            var i0= (this.page - 1) * this.ppp;
            var i1= i0 + this.ppp;
            return this.profiles.slice(i0, i1);
        },
        max_page_number: function(){
            return Math.ceil(this.profiles.length / this.ppp);  
        },
        profile: function(){
        	return this.profiles[0];
        }
    },
    methods:  {
        init: function(){
            if (!this.api_url) {
                // Skip API call when no endpoint is defined on the page
                return;
            }
            var that = this;
            axios.get(this.api_url)
                .then(function(response){
                    if(response.data && Array.isArray(response.data.profiles)){
                        that.profiles = response.data.profiles.map(function(p){
                            if(p.src && p.src.indexOf('no_img_Vrouw.jpg') !== -1){
                                p.src = 'img/fallback.svg';
                            }
                            return p;
                        });
                    } else {
                        console.error('Invalid profile data', response.data);
                        that.dataError = true;
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    that.dataError = true;
                });
        },
        set_page_number: function(page){
            if(page <= 1){
                this.page= 1;
            } else if(page >= this.max_page_number){
                this.page= this.max_page_number;
            } else {
                this.page= page;
            }

            var el = this.$el;
            this.$nextTick(function(){
                if (el && typeof el.scrollIntoView === 'function') {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });

        },
        imgError: function(event){
            event.target.src = 'img/fallback.svg';
        }
    }
    });
}
