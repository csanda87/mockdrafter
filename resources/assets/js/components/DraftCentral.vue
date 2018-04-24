<template>
    <div>
        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    <template v-if="selectedDraftSlot.id">
                        <h3 style="margin-top: 0">Current Selection:</h3>
                        {{ selectedDraftSlot.pick }} - {{ selectedDraftSlot.team.name }}
                        <small v-if="selectedDraftSlot.notes && selectedDraftSlot.id" class="text-muted">{{ selectedDraftSlot.notes }}</small>
                    </template>
                </div>
                <div class="col-sm-6">
                    <template v-if="selectedPlayer.id">
                        <h3 style="margin-top: 0">Current Selection:</h3>
                        {{ selectedPlayer.name }} - {{ selectedPlayer.position }}</strong><br>
                        <span class="text-muted">{{ selectedPlayer.school }}</span><br><br>
                    </template>
                </div>
            </div>
            <hr>
            <div v-if="selectedDraftSlot.id && selectedPlayer.id">
                <button @click="makeSelction(selectedPlayer)" class="btn btn-sm btn-primary">Make Selection</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <draft-round :year="year" v-on:select-draft-slot="selectedDraftSlot = $event"></draft-round>
            </div>
            <div class="col-sm-6">
                <player-list :year="year" v-on:select-player="selectedPlayer = $event"></player-list>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user-id'],
        data: () => ({
            selectedPlayer: {},
            selectedDraftSlot: {},
            year: 2018,
        }),
        components: {
            'draft-round': require('./DraftRound.vue'),
            'player-list': require('./PlayerList.vue')
        },
        methods: {
            // makeSelection(player) {
            //     alert('make selection');
                // if (this.activeDraftSlotId <= 32) {
                //     axios.post('/api/select-player', {
                //         user_id: parseInt(this.userId),
                //         draft_slot_id: this.activeDraftSlotId,
                //         player_id: player.id
                //     })
                //     .then((response) => {
                //         this.activeDraftSlotId++;
                //         this.players = _.filter(this.players, function(p){ 
                //             return p.id != player.id;
                //         });
                //         this.selectedPlayers.push(player);
                //     })
                //     .catch((error) => {
                //         console.warn(error);
                //     });
                // } else {
                //     alert('No mas!');
                // }
            // }
        },
        created() {
            // this.getDraftSlots();
        }
    }
</script>
