<template>
<div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit Deposit</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Amount:</label>
        </div>
        <div class="field-body">
          <div class="field is-expanded">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input type="number" class="input" v-model="deposit.amount" :class="{'is-danger':errors.amount}">
                <span class="icon is-small is-left">
                  <i class="fa fa-money"></i>
                </span>
              </p>
            </div>
            <p class="help is-danger" v-if="errors.amount">{{ errors.amount[0] }}</p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Date & Time:</label>
        </div>
        <div class="field-body">
          <div class="field is-expanded">
            <div class="field">
              <p class="input">{{ moment().format("MMMM D, YYYY @ hh:mm a") }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click='update'>Update</button>
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
      deposit: {
        amount: ''
      },
      errors: {}
    }
  },
  methods: {
    close() {
      this.$emit('closeRequest')
    },
    update() {
      axios.patch(`/jc/savings/${this.deposit.id}`, this.$data.deposit).then((response) => this.close())
        .catch((error) => this.errors = error.response.data.errors)
    }
  }
}
</script>

<style>

</style>
