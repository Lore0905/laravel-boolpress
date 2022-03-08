<template>
    <div class="wrapping-header">
        <div class="container">
            <ul>
                <li v-for="(link, index) in links" :key="index">
                    <router-link   class="link" :to="{ name: link.name }">{{ link.label }}</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Header',
    data: function(){
        return {
            links: [
                {
                    name: 'home',
                    label: 'Home'
                },
                {
                    name: 'about',
                    label: 'About'
                },
                {
                    name: 'blog',
                    label: 'Blog'
                },
                {
                    name: 'contacts',
                    label: 'Contacts'
                },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
.wrapping-header{
    width: 100%;
    height: 10vh;
    min-height: 50px;
    background-color: #1a5f7a;
    display: flex;
    justify-content: center;
    align-items: center;

    .container{

        ul{
            
            li{
                list-style: none;
                float: left;
                margin: 0px 20px 0 20px;
                font-size: 20px;
                border-radius: 10px;
                border: 1px solid black;

                .link{
                    padding: 10px 20px;
                }
            }
            li:hover{
                background-color: #ffc900;
            }
        }
    }
}
</style>