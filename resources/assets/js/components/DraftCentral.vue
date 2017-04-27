<template>
    <div class="row">
        <div class="col-sm-6">
            <div class="list-group">
                <div class="list-group-item" 
                    v-for="(slot, index) in draftSlots"
                    :class="slot.pick == activeDraftSlotId ? 'active' : ''">
                    {{ slot.pick }} - {{ slot.team.name }}
                    <span class="text-muted" v-if="slot.notes && slot.id"><small>{{ slot.notes }}</small></span>
                    <span style="margin-left: 15px">
                        <strong v-if="selectedProspects.length >= index && selectedProspects[index]">
                            {{ selectedProspects[index].position }} {{ selectedProspects[index].name }}
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="list-group">
                <div class="list-group-item" 
                    v-for="prospect in prospects"
                    v-on:click="draftProspect(prospect)">
                    <strong>{{ prospect.position }} - {{ prospect.name }}</strong><br>
                    <span class="text-muted">{{ prospect.school }} {{ prospect.height }} {{ prospect.weight }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user-id'],
        data() {
            return {
                activeDraftSlotId: 1,
                draftSlots: [],
                prospects: [],
                selectedProspects: []
            }
        },
        mounted() {
            this.getDraftSlots();
            this.getProspects();
        },
        components: {
            // 'draft-slot': require('./DraftSlot.vue')
        },
        methods: {
            getDraftSlots() {
                axios.get('/api/draft-order/2017/1')
                .then((response) => {
                    this.draftSlots = response.data;
                })
                .catch((error) => {
                    console.warn(error);
                });
            },
            getProspects() {
                axios.get('/api/draft-prospects/2017')
                .then((response) => {
                    this.prospects = response.data;
                })
                .catch((error) => {
                    console.warn(error);
                });
            },
            draftProspect(prospect) {
                if (this.activeDraftSlotId <= 32) {
                    axios.post('/api/draft-prospect', {
                        user_id: parseInt(this.userId),
                        draft_slot_id: this.activeDraftSlotId,
                        player_id: prospect.id
                    })
                    .then((response) => {
                        this.activeDraftSlotId++;
                        this.prospects = _.filter(this.prospects, function(p){ 
                            return p.id != prospect.id;
                        });
                        this.selectedProspects.push(prospect);
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
                } else {
                    alert('No mas!');
                }
            }
        }
    }
</script>
