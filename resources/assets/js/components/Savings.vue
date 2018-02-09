<template>
<div>
  <nav class="panel">
    <p class="panel-heading pb-4">
      Deposits
      <a class="button is-black is-pulled-right" @click="openAdd">Add</a>
    </p>
    <div class="panel-block">
      <p class="control has-icons-left">
        <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
        <span class="icon is-small is-left">
            <i class="fa fa-search"></i>
          </span>
      </p>
    </div>

    <span v-if="deposits.length">
      <p class="panel-block">
        <a  class="column is-3">ID</a>
        <a class="column is-3">Amount</a>
        <a class="column is-3">Date</a>
        <a class="column is-3">View</a>
        <!-- <a class="column is-1">Delete</a> -->
      </p>
    <paginate name="temp" ref="paginator" :list="temp" :per="5" class="paginate-list">
      <a class="panel-block" v-for="deposit, key in paginated('temp')">
        <span class="column is-3">
          {{ deposit.id }}.
        </span>
    <span class="column is-3">
              P{{ number_format(deposit.amount) }}
            </span>
    <span class="column is-3">
              <div class="button is-black">{{ moment(deposit.created_at).format("M/D/Y") }}</div>
            </span>
    <span class="column is-3">
              <i class="fa fa-eye has-text-primary" @click="openView(key)"></i>
            </span>
    <!-- <span class="panel-icon column is-1">
              <i class="fa fa-edit has-text-info" @click="openEdit(key)"></i>
            </span> -->
    <!-- <span class="panel-icon column is-1">
              <span v-if="loading">
                <i class="fa fa-spinner fa-pulse fa-fw"></i>
              </span>
    <span v-else>
                <i class="fa fa-trash has-text-danger" @click="del(key,deposit.id)"></i>
              </span>
    </span> -->
    </a>
    </paginate>
    </span>
    <span class="panel-block" v-else>
      <i>Have not deposited yet!</i>
    </span>

    <!-- <li v-for="item in paginated('deposits')">
      {{ item.amount }}
    </li> -->
    <nav class="pagination is-centered mt-3" role="navigation" aria-label="pagination">
      <paginate-links for="temp" :hide-single-page="true" :async="true" :limit="2" :show-step-links="true" :classes="{
        'ul': 'pagination-list',
        'a': 'pagination-link',
      }"></paginate-links>
    </nav>
    <span v-if="$refs.paginator">
      Viewing {{$refs.paginator.pageItemsCount}} results
    </span>
  </nav>
  <Adddeposit :openmodal='addActive' @closeRequest='close'></Adddeposit>
  <Viewdeposit :openmodal='viewActive' @closeRequest='close'></Viewdeposit>
  <Editdeposit :openmodal='editActive' @closeRequest='close'></Editdeposit>
</div>
</template>

<script>
let Adddeposit = require('./savings/AddDeposit.vue');
let Viewdeposit = require('./savings/ViewDeposit.vue');
let Editdeposit = require('./savings/EditDeposit.vue');
var moment = require('moment');
var number_format = require('locutus/php/strings/number_format');

export default {
  components: {
    Adddeposit,
    Viewdeposit,
    Editdeposit
  },
  data() {
    return {
      addActive: '',
      viewActive: '',
      editActive: '',
      deposits: {},
      paginate: ['temp'],
      errors: {},
      loading: false,
      moment: moment,
      number_format: number_format,
      searchQuery: '',
      temp: ''
    }
  },
  watch: {
    searchQuery() {
      if (this.searchQuery.length > 0) {
        this.temp = this.deposits.filter((deposit) => {
          return Object.keys(deposit).some((key) => {
            let string = String(deposit[key])
            return string.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
          })
        });
        // console.log(result)
      } else {
        this.temp = this.deposits
      }
    }
  },
  mounted() {
    axios.post('/getDepositData')
      .then((response) => this.deposits = this.temp = response.data)
      .catch((error) => this.errors = error.response.data.errors)

    setTimeout(() => {
      this.shown = true
    }, 1000)
  },
  methods: {
    openAdd() {
      this.addActive = 'is-active';
    },
    openView(key) {
      this.$children[2].deposit = this.paginate.temp.list[key];
      this.viewActive = 'is-active';
    },
    openEdit(key) {
      this.$children[3].deposit = this.paginate.temp.list[key];
      this.editActive = 'is-active';
    },
    close() {
      this.addActive = this.viewActive = this.editActive = '';
    },
    del(key, id) {
      if (confirm("Are you sure you want to delete this item?")) {
        this.loading = !this.loading
        axios.delete(`/jc/savings/${id}`)
          .then((response) => {
            this.deposits.splice(key, 1);
            this.loading = !this.loading
          })
          .catch((error) => this.errors = error.response.data.errors)
      }
      console.log(`${key} ${id}`)
    }
  }
}
</script>

<style>

</style>
