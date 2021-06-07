<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pridėti Organizatorių</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create" method="post">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pavadinimas</label>
                                    <input type="text" class="form-control" id="name" v-model="organizer.name">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Išsaugoti</button>
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
    name: "OrganizerAdd",
    data(){
        return {
            organizer:{
                name:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/organizers/add',this.organizer).then(response=>{
                this.$router.replace({name:"OrganizerList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
