<script setup>
import Layout from './Layout'
import { Head } from '@inertiajs/vue3'

defineProps({ user: Object })
</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p class="bg-black text-white">Hello {{ user.name }}, welcome to your first Inertia app!</p>
  </Layout>
</template>