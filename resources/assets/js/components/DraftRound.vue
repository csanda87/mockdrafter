<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style="margin: 0">Picks</h2>
                </div>
                <div class="col-sm-6">
                    <select v-model="selectedRound" class="form-control">
                        <option v-for="round in rounds" :value="round">Round {{ round }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="list-group">
            <draft-slot 
                v-for="draftSlot in draftSlots"
                :key="draftSlot.id"
                :draft-slot="draftSlot"
                :class="draftSlot.pick == activeDraftSlot.pick ? 'active' : ''"
                @click.native="setActiveDraftSlot(draftSlot)">        
            </draft-slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mockDraft','year'],
        data: () => ({
            activeDraftSlot: {},
            draftSlots: [],
            rounds: [1,2,3,4,5,6,7],
            selectedRound: 1,
        }),
        components: {
            'draft-slot': require('./DraftSlot.vue')
        },
        methods: {
            getDraftSlots() {
                axios.get('/api/draft-order/' + this.year + '/' + this.selectedRound)
                    .then((response) => {
                        this.draftSlots = response.data;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },
            setActiveDraftSlot(slot) {
                this.activeDraftSlot = slot;
                this.$emit('select-draft-slot', slot);
            }
        },
        watch: {
            mockDraft() {
                alert('mock-draft-changed');
            },
            selectedRound() {
                this.getDraftSlots();
            }
        },
        created() {
            this.getDraftSlots();
        }
    }
</script>
