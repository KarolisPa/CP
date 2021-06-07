<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"EventAdd"}' class="btn btn-primary">Naujas renginys</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Renginiai</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pavadinimas</th>
                                <th>Pradžios data</th>
                                <th>Pabaigos data</th>
                                <th>Vieta</th>
                                <th>Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody v-if="events.length > 0">
                            <tr v-for="(event,key) in events" :key="key">
                                <td>{{ event.id }}</td>
                                <td>{{ event.name }}</td>
                                <td>{{ event.start_date }}</td>
                                <td>{{ event.end_date }}</td>
                                <td>{{ event.place }}</td>
                                <td>
                                    <router-link :to='{name:"EventEdit",params:{id:event.id}}' class="btn btn-success">Edit</router-link>
                                    <button type="button" @click="deleteEvent(event.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">Nerasta jokių renginių</td>
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
    name: "EventList",
    data(){
        return {
            events:[]
        }
    },
    mounted(){
        this.getEventList()
    },
    methods:{
        async getEventList(){
            await this.axios.get('/api/events').then(response=>{
                this.events = response.data.data
            }).catch(error=>{
                console.log(error)
                this.events = []
            })
        },
        deleteEvent(id){
            if(confirm("Ar tikrai norite ištrinti renginį ?")){
                this.axios.delete(`/api/events/${id}/delete`).then(response=>{
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
