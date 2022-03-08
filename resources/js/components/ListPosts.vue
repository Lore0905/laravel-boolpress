<template>
    <div>
        <!-- title -->
        <h1>Posts</h1>

        <!-- card -->
        <div class="container">
            <div class="row row-cols-4">
                <div class="col " v-for="post in posts" :key="post.id">

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
                        
                        <div class="card-body">
                            <router-link   class="card-link" :to="{ name: 'post-details', params: { slug: post.slug} }">Details</router-link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'ListPost',
    data: function(){
        return{
            posts:[]
        };
    },
    methods: {
        getPost: function(){
            axios.get('http://127.0.0.1:8000/api/posts')
            .then(response => {
                this.posts = response.data.posts
            });
        },
        troncateString: function(text, finischString){
            if(text.length > finischString){
                return text.substr(0,finischString) + ' ...';
            }

            return  text;
        }
    },
    created: function(){
        this.getPost();
    }
}
</script>

<style lang="scss" scoped>
h1{
    text-align: center;
    padding: 20px;
    color: white;
}
</style>