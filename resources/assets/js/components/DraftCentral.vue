<template>
    <div class="row">
        <div class="col-sm-6">
            <div class="list-group">
                <div class="list-group-item" 
                    v-for="(slot, index) in draftSlots"
                    :class="slot.pick == activeDraftSlotId ? 'active' : ''">
                    {{ slot.pick }} - {{ slot.team.name }}
                    <small class="text-muted" v-if="slot.notes && slot.id">{{ slot.notes }}</small>
                    <span style="margin-left: 15px">
                        <strong v-if="selectedProspects.length >= index && selectedProspects[index]">
                            {{ selectedProspects[index].position }} {{ selectedProspects[index].name }}
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <player-list></player-list>
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
                selectedProspects: []
            }
        },
        created() {
            this.getDraftSlots();
        },
        components: {
            // 'draft-slot': require('./DraftSlot.vue')
        },
        methods: {
            getDraftSlots() {
                axios.get('/api/draft-order/2018/1')
                    .then((response) => {
                        this.draftSlots = response.data;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            }
        }
    }
</script>
