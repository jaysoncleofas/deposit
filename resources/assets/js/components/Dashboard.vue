<template>
<div class="card">
  <div class="card-content">
    <nav class="level">
      <div class="level-item has-text-centered">
        <div class="">
          <p class="heading">Amount</p>
          <span v-for="totals in total">
            <p class="title" v-if="totals.totalAmount > 0">P{{ number_format(totals.totalAmount) }}</p>
            <p class="title" v-else>0</p>
          </span>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div class="" v-for="totals in total">
          <p class="heading" v-if="totals.totalDeposits > 1">Deposits</p>
          <p class="heading" v-else>Deposit</p>
          <p class="title" v-if="totals.totalDeposits > 0">{{ totals.totalDeposits }}</p>
          <p class="title" v-else>0</p>
        </div>
      </div>
      <!-- <div class="level-item has-text-centered">
        <div class="">
          <p class="heading">Todos</p>
          <p class="title">3,456</p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div class="">
          <p class="heading">Completed</p>
          <p class="title">3,456</p>
        </div>
      </div> -->
    </nav>
  </div>
</div>
</template>

<script>
var number_format = require('locutus/php/strings/number_format');
export default {
  data() {
    return {
      number_format: number_format,
      total: ''
    }
  },
  mounted() {
    axios.post('/DepositDashboard')
      .then((response) => this.total = response.data)
      .catch((error) => this.errors = error.response.data.errors)
  },
}
</script>

<style>

</style>
