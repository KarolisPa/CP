<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pridėti renginį</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create" method="post">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pavadinimas</label>
                                    <input type="text" class="form-control" id="name" v-model="event.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pradžios data</label>
                                    <input type="date" class="form-control" id="start_date" v-model="event.start_date">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pabaigos data</label>
                                    <input type="date" class="form-control" id="end_date" v-model="event.end_date">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Renginio vieta</label>
                                    <input type="text" class="form-control" id="place" v-model="event.place">
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
    name: "EventAdd",
    data(){
        return {
            event:{
                name:"",
                start_date:"",
                end_date:"",
                place:"",
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/events/add',this.event).then(response=>{
                // this.$router.push({name:"EventList"})
                this.$router.replace({name:"EventList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
