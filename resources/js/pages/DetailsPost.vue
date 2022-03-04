<template>
    <div class="container p-5">
        <!-- title -->
        <h1>Posts</h1>

        <!-- card -->
        <div class="text-center">
            <div class="row">
                <div class="col">

                    <div class="card m-2" >
                        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{troncateString(post.content, 100)}}</p>
                        </div>

                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DetailsPost',
    data: function() {
        return{
            post: false
        }
    },
    methods: {
        getPostDetails: function (){
            // this.$route.params.slug, serve per prendere lo slug che è stato inserito nell'url
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success){
                    this.post = response.data.results
                }else{
                    // questa funzione permette di dirottare la rotta. In questo caso viene dirottata nel component Alert, ovvero dove è presente l'errore 404.
                    this.$router.push({ name: 'Alert' });
                }
            })
        },
        troncateString: function(text, finischString){
            if(text.length > finischString){
                return text.substr(0,finischString) + ' ...';
            }

            return  text;
        }
    },
    created: function(){
        this.getPostDetails();
    }
}
</script>