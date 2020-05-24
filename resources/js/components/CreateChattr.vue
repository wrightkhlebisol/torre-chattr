<template>
    <span class="lg:w-2/3 w-1/2">
        <button class="border-solid border-2 mb-5 border-gray-200 rounded-full lg:text-sm lg:p-2 p-1 float-right" @click="toggleCreateChattr">Create Chattr 🖊</button>
        <div v-if="toggleChattr">
            <form @submit="createChattr">
                <div class="mb-2">
                    <input type="text" class="w-full p-2 h-30 border-solid border-2 rounded-md border-black-200 sm:text-xs text-sm" placeholder="Enter your Torre username to begin" v-model="username" @blur="getUserProfile">

                    <p class="text-green-400 text-xs" v-if="searchUser">..fetching user records from torre servers</p>
                    <p class="text-red-400 text-xs" v-if="searchUserError">{{ searchUserError }}</p>
                </div>
                <textarea :disabled="chatterDisabled" required class="w-full p-2 h-30 border-solid border-2 rounded-md border-black-200 sm:text-xs text-sm" name="chattr" id="chattr" placeholder="Create some chattr around this job opportunity" v-model="chattr"></textarea>
                <input v-if="!chatterDisabled" type="submit" class="cursor-pointer rounded-md py-2 px-5 text-white text-sm bg-black" value="Publish">
                <p  v-if="!chatterDisabled" class="text-green-400">User {{ foundname }} with profile weight {{profweight }} found</p>
            </form>
        </div>
    </span>

</template>

<script>
    export default {
        data() {
            return {
                foundname: "",
                profweight: "",
                chattr: "",
                toggleChattr: false,
                username: "",
                searchUser: false,
                searchUserError: "",
                chatterDisabled: true
            }
        },
        methods: {
            getUserProfile(){
                if(this.username){
                    this.searchUser = true;
                    axios.post(`/getTorreDetails`, {
                        'user': this.username
                    })
                    .then((res) => {
                        this.searchUser = false;
                        if(res.data.code && (res.data.code == "011002")){
                            this.searchUserError = `${res.data.message} You can't create a chattr yet`
                        }else{
                            this.chatterDisabled = false;
                            this.searchUserError = ""
                            this.foundname = res.data.person.name
                            this.profweight = res.data.person.weight
                        }
                    }).catch(e => console.log(e))
                }else{
                    this.searchUserError = "Enter username to proceed";
                    this.chatterDisabled = true;
                }
            },
            toggleCreateChattr(){
                this.toggleChattr = !this.toggleChattr;
            },
            createChattr(){
                axios.post('/', {
                    user: this.username,
                    chattr: this.chattr
                }).then()
                .catch()
                // if(this.chattr){
                //     alert(this.chattr)
                // }else{
                //     alert("Please enter some chattr")
                // }
            }
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
