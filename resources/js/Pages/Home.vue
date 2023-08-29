<script setup>
import { ref } from 'vue';
import Layout from './Layout'
import { Head } from '@inertiajs/vue3'
const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
const data = ref([])
async function fetchData() {
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    token: csrf
  };
  const response = await fetch('/api/scrape', requestOptions).then(res => res.json())
  data.value = response.message ?? []
}

defineProps({ user: Object })
</script>

<template>
  <Layout>

    <Head title="Home | Bilpro" />
    <button @click="fetchData" class="btn">Ambil data dari backend</button>
    <div class="overflow-x-auto">
      <table class="table table-zebra">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th>Partner</th>
            <th>IdNumber</th>
            <th>BPName</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 2 -->
          <tr v-for="row, index in data.slice(1)">
            <th>{{ index + 1 }}</th>
            <td>{{ row.Partner }}</td>
            <td>{{ row.Idnumber }}</td>
            <td>{{ row.BPName }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>