<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"OrganizerAdd"}' class="btn btn-primary">Naujas organizatorius</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Organizatoriai</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pavadinimas</th>
                                <th>Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody v-if="organizers.length > 0">
                            <tr v-for="(organizer,key) in organizers" :key="key">
                                <td>{{ organizer.id }}</td>
                                <td>{{ organizer.name }}</td>
                                <td>
                                    <router-link :to='{name:"OrganizerEdit",params:{id:organizer.id}}' class="btn btn-success">Edit</router-link>
                                    <button type="button" @click="deleteOrganizer(organizer.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">Nerasta jokių organizatorių</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OrganizerList",
    data(){
        return {
            organizers:[]
        }
    },
    mounted(){
        this.getEventList()
    },
    methods:{
        async getEventList(){
            await this.axios.get('/api/organizers').then(response=>{
                this.organizers = response.data.data
            }).catch(error=>{
                console.log(error)
                this.organizers = []
            })
        },
        deleteOrganizer(id){
            if(confirm("Ar tikrai norite pašalinti organizatorių ?")){
                this.axios.delete(`/api/organizers/${id}/delete`).then(response=>{
                    this.getEventList()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
