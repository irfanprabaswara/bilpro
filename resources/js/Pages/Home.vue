<script setup>
import { computed, ref } from 'vue';
import Layout from './Layout'
import { Head } from '@inertiajs/vue3'
const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
const data = ref([])
const searchQuery = ref('')
const filtered = computed(() => data.value.slice(1).filter(row =>
  (row['Partner'] ?? '').includes(searchQuery.value) ||
  (row['Idnumber'] ?? '').includes(searchQuery.value) ||
  (row['BPName'] ?? '').includes(searchQuery.value) ||
  (row['Account Name'] ?? '').includes(searchQuery.value) ||
  (row['Subsegmen'] ?? '').includes(searchQuery.value) ||
  (row['Business Share'] ?? '').includes(searchQuery.value) ||
  (row['Divisi'] ?? '').includes(searchQuery.value) ||
  (row['Witel'] ?? '').includes(searchQuery.value) ||
  (row['Cicilan'] ?? '').includes(searchQuery.value) ||
  (row['Bill Curr'] ?? '').includes(searchQuery.value) ||
  (row['Saldo Akhir N-1'] ?? '').includes(searchQuery.value) ||
  (row['Tagihan N'] ?? '').includes(searchQuery.value) ||
  (row['Total Tagihan'] ?? '').includes(searchQuery.value) ||
  (row['Total CL'] ?? '').includes(searchQuery.value) ||
  (row['Saldo Akhir'] ?? '').includes(searchQuery.value) ||
  (row['0-3 Bulan'] ?? '').includes(searchQuery.value) ||
  (row['4-6 Bulan'] ?? '').includes(searchQuery.value) ||
  (row['7-12 Bulan'] ?? '').includes(searchQuery.value) ||
  (row['13-24 Bulan'] ?? '').includes(searchQuery.value) ||
  (row['> 24 Bulan'] ?? '').includes(searchQuery.value) ||
  (row['L11 Saldo'] ?? '').includes(searchQuery.value) ||
  (row['STATUS 1'] ?? '').includes(searchQuery.value) ||
  (row['UPDATE TUNGGAKAN'] ?? '').includes(searchQuery.value) ||
  (row['TGL UPDATE'] ?? '').includes(searchQuery.value) ||
  (row['STATUS 2'] ?? '').includes(searchQuery.value) ||
  (row['SEGMEN 2'] ?? '').includes(searchQuery.value) ||
  (row['AM UPDATE'] ?? '').includes(searchQuery.value) ||
  (row['NAMA PELANGGAN'] ?? '').includes(searchQuery.value) ||
  (row['STO'] ?? '').includes(searchQuery.value) ||
  (row['HERO'] ?? '').includes(searchQuery.value) ||
  (row['DATEL'] ?? '').includes(searchQuery.value)
));
async function fetchData() {
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    token: csrf
  };
  const response = await fetch('/api/scrape', requestOptions).then(res => res.json())
  data.value = response.message ?? []
}

function filterData(e) {
  console.log(e.target.value)
  searchQuery.value = e.target.value
}

defineProps({ user: Object })
</script>

<template>
  <Layout>

    <Head title="Home | Bilpro" />
    <button @click="fetchData" class="btn">Ambil data dari backend</button>
    <input @search="filterData" type="search" placeholder="Search here" class="input input-bordered w-full" />
    <p v-if="searchQuery !== ''">Search result for: <b><i>{{ searchQuery }}</i></b></p>
    <div class="overflow-x-auto">
      <table class="table table-zebra">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th>Partner</th>
            <th>IdNumber</th>
            <th>BPName</th>
            <th>Account Name</th>
            <th>Subsegmen</th>
            <th>Business Share</th>
            <th>Divisi</th>
            <th>Witel</th>
            <th>Cicilan</th>
            <th>Bill Curr</th>
            <th>Saldo Akhir N-1</th>
            <th>Tagihan N</th>
            <th>Total Tagihan</th>
            <th>Total CL</th>
            <th>Saldo Akhir</th>
            <th>0-3 Bulan</th>
            <th>4-6 Bulan</th>
            <th>7-12 Bulan</th>
            <th>13-24 Bulan</th>
            <th>> 24 Bulan</th>
            <th>L11 Saldo</th>
            <th>STATUS 1</th>
            <th>UPDATE TUNGGAKAN</th>
            <th>TGL UPDATE</th>
            <th>STATUS 2</th>
            <th>SEGMEN 2</th>
            <th>AM UPDATE</th>
            <th>NAMA PELANGGAN</th>
            <th>STO</th>
            <th>HERO</th>
            <th>DATEL</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 2 -->
          <tr v-for="row, index in filtered">
            <th>{{ index + 1 }}</th>
            <td>{{ row['Partner'] }}</td>
            <td>{{ row['Idnumber'] }}</td>
            <td>{{ row['BPName'] }}</td>
            <td>{{ row['Account Name'] }}</td>
            <td>{{ row['Subsegmen'] }}</td>
            <td>{{ row['Business Share'] }}</td>
            <td>{{ row['Divisi'] }}</td>
            <td>{{ row['Witel'] }}</td>
            <td>{{ row['Cicilan'] }}</td>
            <td>{{ row['Bill Curr'] }}</td>
            <td>{{ row['Saldo Akhir N-1'] }}</td>
            <td>{{ row['Tagihan N'] }}</td>
            <td>{{ row['Total Tagihan'] }}</td>
            <td>{{ row['Total CL'] }}</td>
            <td>{{ row['Saldo Akhir'] }}</td>
            <td>{{ row['0-3 Bulan'] }}</td>
            <td>{{ row['4-6 Bulan'] }}</td>
            <td>{{ row['7-12 Bulan'] }}</td>
            <td>{{ row['13-24 Bulan'] }}</td>
            <td>{{ row['> 24 Bulan'] }}</td>
            <td>{{ row['L11 Saldo'] }}</td>
            <td>{{ row['STATUS 1'] }}</td>
            <td>{{ row['UPDATE TUNGGAKAN'] }}</td>
            <td>{{ row['TGL UPDATE'] }}</td>
            <td>{{ row['STATUS 2'] }}</td>
            <td>{{ row['SEGMEN 2'] }}</td>
            <td>{{ row['AM UPDATE'] }}</td>
            <td>{{ row['NAMA PELANGGAN'] }}</td>
            <td>{{ row['STO'] }}</td>
            <td>{{ row['HERO'] }}</td>
            <td>{{ row['DATEL'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>