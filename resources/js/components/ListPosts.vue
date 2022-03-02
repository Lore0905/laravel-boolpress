<template>
    <div>
        <!-- title -->
        <h1>Lasta dei Post</h1>

        <!-- card -->
        <div class="container">
            <div class="row row-cols-4">
                <div class="col " v-for="post in posts" :key="post.id">

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
                        
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
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

<style>

</style>