<script setup>
import { ref } from 'vue';
import Layout from './Layout'
import { Head } from '@inertiajs/vue3'
//const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
const category=ref('segment');
const typeRevenue=ref('count');
const type={
  count:["count_tagihan", "count_tunggakan"],
  sum:["sum_tagihan", "sum_tunggakan"]
}

defineProps({ data: Object })
</script>

<template>
  <Layout>

    <Head title="Home | Bilpro" />
    <form action="#">
      <table>
        <div>
          <th>
          <label for="filter1">Choose Filter 1 (Segmen/AM) : </label>
          <td>
            <select v-model="category" id="filter1" name="filter1">
              <option value="segment">SEGMEN</option>
              <option value="am">AM</option>
            </select>
          </td>
        </th>
        <th>
          <label for="filter2">Choose Filter 2 (ID/Rupiah) : </label>
          <td>
            <select v-model="typeRevenue" id="filter2" name="filter2">
              <option value="count">ID</option>
              <option value="sum">Rupiah</option>
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
            <th>SEGMEN/NAMA AM</th>
            <th bgcolor="#ff3333">TUNGGAKAN</th>
            <th bgcolor="#ffff33">TAGIHAN BULAN BERJALAN</th>
            <th bgcolor="#ffad33">PROSES PEMBAYARAN</th>
            <th bgcolor="#33ffff">BUKTI TRANSFER</th>
            <th bgcolor="#33ffff">BUKTI POTONG PAJAK</th>
            <th bgcolor="#33ff33">LUNAS</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 2 -->
          <tr v-for="key, index in Object.keys(data[category])">
            <th>{{ key }}</th>
            <td v-for="col in type[typeRevenue]">
            <a class="link link-primary" href="/detail">{{ typeRevenue=='sum'?data[category][key][col].toLocaleString('id-ID', {
              style: 'currency',
              currency: 'IDR',
            }):data[category][key][col] }}</a>
            </td>
            <!-- <td>{{ data[category][key]['count_tunggakan'] }}</td> -->
            
          </tr>
        </tbody>
      </table>
    </div>

  </Layout>
</template>