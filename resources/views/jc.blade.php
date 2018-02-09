@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
      <div class="column is-2">
        @include('_includes.sidenav')
      </div>
      <div class="column is-10">
        <router-view></router-view>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
export default {
computed: {
  username () {
    // We will see what `params` is shortly
    return this.$route.params.username
  }
},
methods: {
  goBack () {
    window.history.length > 1
      ? this.$router.go(-1)
      : this.$router.push('/')
  }
}
}
</script>
@endsection
