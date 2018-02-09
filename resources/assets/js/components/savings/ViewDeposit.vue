<template>
<div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">View deposit</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
      <li class="panel-block">
        <label for="" class="column is-2"><b>Amount:</b></label>P{{ deposit.amount }}
      </li>
      <li class="panel-block">
        <label for="" class="column is-2"><b>Time & Date:</b></label>{{ moment(deposit.created_at).format("MMMM D, YYYY @ hh:mm a") }}
      </li>
    </section>
    <footer class="modal-card-foot">
      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>
</template>

<script>
var moment = require('moment');
export default {
  props: ['openmodal'],
  data() {
    return {
      moment: moment,
      deposit: ''
    }
  },
  methods: {
    close() {
      this.$emit('closeRequest')
    }
  }
}
</script>

<style>

</style>
