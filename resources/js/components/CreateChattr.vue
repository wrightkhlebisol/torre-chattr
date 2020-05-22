<template>
    <span>
        <button class="border-solid border-2 mb-5 border-gray-200 rounded-full p-2" @click="createChattr">Create Chattr</button>
        <div v-if="toggleChattr">
            <form>
                <textarea class="w-full p-2 h-30 border-solid border-2 rounded-md border-black-200" name="chattr" id="chattr" placeholder="Create some chattr around this opportunity" v-model="chattr"></textarea>
                <input type="submit" class="cursor-pointer rounded-md py-2 px-5 text-white bg-black" value="Publish">
            </form>
        </div>
    </span>

</template>

<script>
    export default {
        data() {
            return {
                chattr: "Our text",
                toggleChattr: true,
            }
        },
        methods: {
            createChattr(){
                this.toggleChattr = !this.toggleChattr;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
