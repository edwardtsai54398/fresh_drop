<template>
  <h1>後台頁面</h1>
  <div class="home">
    home
  </div>
  <aside class="col-md-3">
    <div class="list-group">
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action"
          :class="{ 'active': $route.name === 'backend' }">
          後台首頁
        </button>
        <button type="button" class="list-group-item list-group-item-action"
          :class="{ 'active': $route.name === 'package' }">
          行程
        </button>
        <button type="button" class="list-group-item list-group-item-action"
          :class="{ 'active': $route.name === 'organize' }">
          開團
        </button>
        <button type="button" class="list-group-item list-group-item-action"
          :class="{ 'active': $route.name === 'bootstrap' }">
          test bootstrap
        </button>
      </div>
    </div>
  </aside>
  <main class="col-12 user-control-content">
    <router-view></router-view>
  </main>
  <div>
    <div>
      <b-button-group class="bg-primary-subtle">
        <b-button class="">Button 1</b-button>
        <b-button>Button 2</b-button>
        <b-button>Button 3</b-button>
      </b-button-group>
    </div>
    <div class="mt-3">
      <b-button-group>
        <b-button variant="success">Success</b-button>
        <b-button variant="info">Info</b-button>
        <b-button variant="warning">Warning</b-button>
      </b-button-group>
    </div>
  </div>
  <div>
    <b-dropdown id="dropdown-1" text="Dropdown Button" class="m-md-2">
      <b-dropdown-item>First Action</b-dropdown-item>
      <b-dropdown-item>Second Action</b-dropdown-item>
      <b-dropdown-item>Third Action</b-dropdown-item>
      <b-dropdown-divider></b-dropdown-divider>
      <b-dropdown-item active>Active action</b-dropdown-item>
      <b-dropdown-item disabled>Disabled action</b-dropdown-item>
    </b-dropdown>
  </div>
  <div>
    <b-form-rating v-model="value"></b-form-rating>
    <p class="mt-2">Value: {{ value }}</p>
  </div>
  <div>
    <b-button-toolbar key-nav aria-label="Toolbar with button groups">
      <b-button-group class="mx-1">
        <b-button>&laquo;</b-button>
        <b-button>&lsaquo;</b-button>
      </b-button-group>
      <b-button-group class="mx-1">
        <b-button>Edit</b-button>
        <b-button>Undo</b-button>
        <b-button>Redo</b-button>
      </b-button-group>
      <b-button-group class="mx-1">
        <b-button>&rsaquo;</b-button>
        <b-button>&raquo;</b-button>
      </b-button-group>
    </b-button-toolbar>
  </div>
</template>




<script>
import "bootstrap";
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
export default {
  components: {
  },
  data() {
    return {
      value: null,
    }
  }
}
</script>