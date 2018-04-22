<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style="margin: 0">Players</h2>
                </div>
                <div class="col-sm-6">
                    <select v-model="selectedPosition" class="form-control">
                        <option v-for="position in positions" :value="position">{{ position }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="well" style="margin-bottom: 0">
                <template v-if="selectedPlayer">
                    <h3 style="margin-top: 0">Current Selection:</h3>
                    {{ selectedPlayer.name }} - {{ selectedPlayer.position }}</strong><br>
                    <span class="text-muted">{{ selectedPlayer.school }}</span><br><br>
                    <button @click="makeSelction(selectedPlayer)" class="btn btn-sm btn-primary">Make Selection</button>
                </template>
                <template v-else>
                    <h3 style="margin-top: 0">&nbsp;</h3>
                    Select a player.</strong><br>
                    &nbsp;<br><br>
                    <button @click="makeSelction(selectedPlayer)" class="btn btn-sm btn-primary" disabled>Make Selection</button>
                </template>
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item" 
                v-for="player in filteredPlayers"
                @click="selectPlayer(player)">
                <strong>{{ player.name }} - {{ player.position }}</strong><br>
                <span class="text-muted">{{ player.school }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user-id'],
        data() {
            return {
                positions: [
                    'Best Available',
                    'QB','RB','WR','TE','OT','OG','OC',
                    'DL', 'EDGE', 'LB', 'CB', 'S'
                ],
                players: [],
                selectedPlayer: null,
                selectedPlayers: [],
                selectedPosition: 'Best Available',
            }
        },
        computed: {
            filteredPlayers() {
                if (this.selectedPosition !== 'Best Available') {
                    return this.players.filter((player) => {
                        return player.position === this.selectedPosition;
                    });
                }

                return this.players;
            }
        },
        created() {
            this.getPlayers();
        },
        components: {
            // 'draft-slot': require('./DraftSlot.vue')
        },
        methods: {
            getPlayers() {
                axios.get('/api/players/2018')
                    .then((response) => {
                        this.players = response.data;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },
            selectPlayer(player) {
                this.selectedPlayer = player;
            },
            makeSelection(player) {
                alert('make selection');
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
            }
        }
    }
</script>
