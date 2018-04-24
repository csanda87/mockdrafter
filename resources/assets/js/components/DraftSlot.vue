<template>
    <button type="button" class="list-group-item">
        {{ draftSlot.pick }} - {{ draftSlot.team.name }}
        <small v-if="draftSlot.notes && draftSlot.id" class="text-muted">{{ draftSlot.notes }}</small>
        <!-- <span style="margin-left: 15px">
            <strong v-if="selectedProspects.length >= index && selectedProspects[index]">
                {{ selectedProspects[index].position }} {{ selectedProspects[index].name }}
            </strong>
        </span> -->
    </button>
</template>

<script>
    export default {
        props: ['draftSlot'],
        data: () => ({
            //
        }),
        components: {
            // 'draft-slot': require('./DraftSlot.vue')
        },
        methods: {
            // getDraftSlots() {
            //     axios.get('/api/draft-order/2018/1')
            //         .then((response) => {
            //             this.draftSlots = response.data;
            //             this.activeDraftSlot = response.data[0];
            //         })
            //         .catch((error) => {
            //             console.warn(error);
            //         });
            // },
            // setActiveDraftSlot(slot) {
            //     this.activeDraftSlot = slot;
            // }
        },
        created() {
            // this.getDraftSlots();
        },
    }
</script>

<style>
    .active .text-muted {
        color: white;
    }
</style>