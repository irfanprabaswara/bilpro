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
    <form action="#">
      <table>
        <div>
          <th>
          <label for="filter1">Choose Filter 1 (Segmen/AM) : </label>
          <td>
            <select id="filter1" name="filter1">
              <option value="segmen">SEGMEN</option>
              <option value="am">AM</option>
            </select>
          </td>
        </th>
        <th>
          <label for="filter2">Choose Filter 2 (ID/Rupiah) : </label>
          <td>
            <select id="filter2" name="filter2">
              <option value="segmen">ID</option>
              <option value="am">Rupiah</option>
            </select>
          </td>
        </th>
        <th>
          <button class="btn">submit</button>
        </th>
        </div>
      </table>
    </form>
    <div class="overflow-x-auto">
      <table class="table table-zebra">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th>SEGMEN/NAMA AM</th>
            <th bgcolor="#ff3333">TUNGGAKAN</th>
            <th>TAGIHAN BULAN BERJALAN</th>
            <th>PROSES PEMBAYARAN</th>
            <th>BUKTI TRANSFER</th>
            <th>BUKTI POTONG PAJAK</th>
            <th>LUNAS</th>
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
          </tr>
        </tbody>
      </table>
    </div>

  </Layout>
</template>