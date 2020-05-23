<template>
    <div class="flex my-5 border-solid border-2 border-gray-200 p-2">
        <div class="flex-1 items-center text-sm p-2">
            <img src="https://i.pravatar.cc/40" :alt="imageLink" class="rounded-full mr-2">
        </div>
        <p class="flex-1 p-2 lg:text-lg text-xs">{{ chattr }}</p>

        <div class="flex-1 items-center lg:text-3xl text-sm">
            <div class="flex-1 p-2">
                <a href="#" @click.prevent="upVote">{{ like }} 👍</a>
            </div>
            <div class="flex-1 p-2">
                <a  href="#" @click.prevent="downVote">{{ dislike }} 👎</a>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'ChattrComponent',
    props: {
        chattr: '',
        likes: 0,
        dislikes: 0,
        imageLink: ''
    },
    data() {
        return {
            like: this.likes,
            dislike: this.dislikes
        }
    },
    methods: {
        upVote(){
            if(this.like){
                this.like = parseInt(this.like) + 1;
            }
        },
        downVote(){
            if(this.dislike){
                this.dislike = parseInt(this.dislike) + 1;
            }
        },
    }
}
</script>
