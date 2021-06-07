<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pakeisti Organizatoriaus informaciją</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pavadinimas</label>
                                    <input type="text" class="form-control" :placeholder="[ organizer.name ]" v-model="organizer.name">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Atnaujinti</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrganizerEdit",
    data(){
        return {
            organizer:{
                name:"",
            }
        }
    },
    mounted(){
        this.loadOrganizers()
    },
    methods:{
        async loadOrganizers(){
            await this.axios.get(`/api/organizers/${this.$route.params.id}`).then(response=>{
                const { name } = response.data
                this.organizer.name = name
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/organizers/${this.$route.params.id}`,this.organizer).then(response=>{
                this.$router.push({name:"OrganizerList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
