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
        props: ['year'],
        data: () => ({
            positions: [
                'Best Available',
                'QB','RB','WR','TE','OT','OG','OC',
                'DL', 'EDGE', 'LB', 'CB', 'S'
            ],
            players: [],
            selectedPlayer: {},
            selectedPosition: 'Best Available',
        }),
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
        methods: {
            getPlayers() {
                axios.get('/api/players/' + this.year)
                    .then((response) => {
                        this.players = response.data;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },
            selectPlayer(player) {
                this.selectedPlayer = player;
                this.$emit('select-player', player);
            },
        },
        created() {
            this.getPlayers();
        },
    }
</script>
