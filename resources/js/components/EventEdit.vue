<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pakeisti Renginio informaciją</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pavadinimas</label>
                                    <input type="text" class="form-control" :placeholder="[ event.name ]" v-model="event.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pradžios data</label>
                                    <input type="date" class="form-control" :placeholder="[ event.start_date ]" v-model="event.start_date">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Pabaigos data</label>
                                    <input type="date" class="form-control" :placeholder="[ event.end_date ]" v-model="event.end_date">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Renginio vieta</label>
                                    <input type="text" class="form-control" :placeholder="[ event.place ]" v-model="event.place">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="organizers">Priskirkite organizatorių</label>
                                    <select class="form-control" v-model="selected"  id="organizers">
                                        <option value="" selected disabled>Pasirinkti organizatorių</option>
                                        <option v-for="organizer in organizers" :value="organizer.id">
                                            {{ organizer.name }}
                                        </option>
                                    </select>
                                    <h1>{{selected}}</h1><p>  <--- Cia ID</p>

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
    name: "EventEdit",
    data(){
        return {
            selected: '',
            organizers:[],
            event:{
                name:"",
                start_date:"",
                end_date:"",
                place:"",
                organizer_id:""
            }
        }
    },
    mounted(){
        this.getEvents();
        this.getOrganizers();
    },
    methods:{
        getOrganizers(){
            axios.get('/api/organizers').then(response=>{
                this.organizers = response.data.data

            }).catch(error=>{
                console.log(error)
                this.organizers = []
            })
        },
        async getEvents(){
            await this.axios.get(`/api/events/${this.$route.params.id}`).then(response=>{
                const { name, start_date, end_date, place } = response.data
                this.event.name = name
                this.event.start_date = start_date
                this.event.end_date = end_date
                this.event.place = place
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            this.event.organizer_id = this.selected;
            await this.axios.put(`/api/events/${this.$route.params.id}`,this.event).then(response=>{
                this.$router.push({name:"EventList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }

}
</script>

<style scoped>

</style>
