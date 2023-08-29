<script setup>
import Layout from './Layout'
import { Head } from '@inertiajs/vue3'
const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
async function fetchData() {
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    token: csrf
  };
  const response = await fetch('/api/scrape', requestOptions).then(res => res.json())
  alert(JSON.stringify(response))
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
            <th>Contoh</th>
            <th>Contoh</th>
            <th>Contoh</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>1</th>
            <td>Cy Ganderton</td>
            <td>Quality Control Specialist</td>
            <td>Blue</td>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>2</th>
            <td>Hart Hagerty</td>
            <td>Desktop Support Technician</td>
            <td>Purple</td>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>3</th>
            <td>Brice Swyre</td>
            <td>Tax Accountant</td>
            <td>Red</td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>