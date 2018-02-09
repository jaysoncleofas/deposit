<template>
<div>
  <div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add New Todo</p>
        <button class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field">
          <label for="" class="label">Todo</label>
          <div class="control">
            <input type="text" class="input">
          </div>
        </div>
        <div class="field">
          <label for="" class="label">Description</label>
          <div class="control">
            <textarea class="textarea" placeholder="Textarea"></textarea>
          </div>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success">Save</button>
        <button class="button">Cancel</button>
      </footer>
    </div>
  </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
