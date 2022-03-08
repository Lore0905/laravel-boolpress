<template>
    <div class="container p-5">
        <!-- title -->
        <h1>Posts</h1>

        <!-- category -->
        <!-- vediamo i tag solo se post.category non è null -->
        <div v-if="post.category">
            <span class="badge bg-warning text-dark category">{{post.category.name}}</span>
        </div>
        <!-- end category -->

        <!-- tags -->
        <div>
            <ul>
                <li v-for="(tag, index) in post.tags" :key="index" class="tags">
                    <a href="">{{tag.name}}</a>
                </li>
            </ul>
        </div>
        <!-- tags -->

        <!-- card -->
        <div class="text-center">
            <div class="row">
                <div class="col">

                    <div class="card m-2" >
                        <!-- faccio vedere l'immagine solo se cover esiste -->
                        <div v-if='post.cover'>
                            <img class="card-img-top" :src="post.cover" alt="Card image cap">
                        </div>
                        
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

<style lang="scss" scoped>
.category{
    font-size: 15px;
    margin: 10px 0 ;
}
.tags{
    margin-top: 5px;
    a{
        font-size: 17px;
        color: white;
    }
}
</style>