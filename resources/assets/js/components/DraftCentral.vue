<template>
    <div>
        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    <template v-if="activeDraftSlot.id">
                        <h3 style="margin-top: 0">Current Selection:</h3>
                        {{ activeDraftSlot.pick }} - {{ activeDraftSlot.team.name }}
                        <small v-if="activeDraftSlot.notes && activeDraftSlot.id" class="text-muted">{{ activeDraftSlot.notes }}</small>
                    </template>
                </div>
                <div class="col-sm-6">
                    <template v-if="activePlayer.id">
                        <h3 style="margin-top: 0">Current Selection:</h3>
                        {{ activePlayer.name }} - {{ activePlayer.position }}</strong><br>
                        <span class="text-muted">{{ activePlayer.school }}</span><br><br>
                    </template>
                </div>
            </div>
            <hr>
            <div v-if="activeDraftSlot.id && activePlayer.id">
                <button @click="makeSelection" class="btn btn-sm btn-primary">Make Selection</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <draft-round :year="year" :mock-draft-picks="mockDraftPicks" v-on:select-draft-slot="activeDraftSlot = $event"></draft-round>
            </div>
            <div class="col-sm-6">
                <player-list :year="year" :mock-draft-picks="mockDraftPicks" v-on:select-player="activePlayer = $event"></player-list>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mock-draft-id','user-id'],
        data: () => ({
            activePlayer: {},
            activeDraftSlot: {},
            mockDraftPicks: [],
            year: 2018,
        }),
        components: {
            'draft-round': require('./DraftRound.vue'),
            'player-list': require('./PlayerList.vue'),
        },
        methods: {
            getMockDraftPicks() {
                axios.get('/api/mock-drafts/' + this.mockDraftId + '/selections')
                .then((response) => {
                    this.mockDraftPicks = response.data;
                })
                .catch((error) => {
                    console.warn(error);
                });
            },
            makeSelection() {
                axios.post('/api/mock-drafts/' + this.mockDraftId + '/selection', {
                    user_id: parseInt(this.userId),
                    draft_slot_id: this.activeDraftSlot.id,
                    player_id: this.activePlayer.id,
                })
                .then((response) => {
                    // this.activeDraftSlotId++;
                    this.mockDraftPicks.push({
                        player: this.activePlayer, 
                        draftSlot: this.activeDraftSlot
                    });
                    this.activePlayer = {};
                    this.activeDraftSlot = {};
                })
                .catch((error) => {
                    console.warn(error);
                });
            }
        },
        created() {
            this.getMockDraftPicks();
        }
    }
</script>
