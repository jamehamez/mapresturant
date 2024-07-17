<template>
  <div class="container">
    <h1 class="my-4 text-center">Restaurant Finder</h1>
    <div class="input-group mb-3">
      <input v-model="query" @keyup.enter="search" class="form-control" placeholder="Search for restaurants...">
      <button @click="search" class="btn btn-primary">Search</button>
    </div>
    <div v-if="loading" class="text-center">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div v-if="!loading">
      <ul class="list-group mb-3">
        <li v-for="restaurant in restaurants" :key="restaurant.place_id" class="list-group-item">
          <h5>{{ restaurant.name }}</h5>
          <p>{{ restaurant.formatted_address }}</p>
          <button @click="showOnMap(restaurant)" class="btn btn-secondary btn-sm">Show on Map</button>
        </li>
      </ul>
      <div id="map" style="height: 400px;"></div>
    </div>
    <div v-if="!loading && !restaurants.length" class="text-center">
      <p>No results found</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      query: 'Bang Sue',
      restaurants: [],
      loading: false,
      map: null,
      markers: []
    };
  },
  methods: {
    async search() {
      this.loading = true;
      try {
        const response = await axios.post('/search', { query: this.query });
        this.restaurants = response.data;
        this.clearMarkers();
        this.restaurants.forEach(restaurant => {
          this.addMarker(restaurant);
        });
      } catch (error) {
        console.error(error);
      } finally {
        this.loading = false;
      }
    },
    initMap() {
      this.map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 13.7563, lng: 100.5018 },
        zoom: 12
      });
    },
    addMarker(restaurant) {
      const marker = new google.maps.Marker({
        position: {
          lat: restaurant.geometry.location.lat,
          lng: restaurant.geometry.location.lng
        },
        map: this.map,
        title: restaurant.name
      });
      this.markers.push(marker);
    },
    clearMarkers() {
      this.markers.forEach(marker => marker.setMap(null));
      this.markers = [];
    },
    showOnMap(restaurant) {
      if (this.map) {
        this.map.setCenter({
          lat: restaurant.geometry.location.lat,
          lng: restaurant.geometry.location.lng
        });
        this.map.setZoom(15);
      }
    }
  },
  mounted() {
    this.initMap();
    this.search();
  }
};
</script>

<style scoped>
body{
  background: url(https://dewands.com/food.jpg);
  background-position: center center;
}
.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;

}
input {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
}
#map {
  width: 100%;
  height: 400px;
}
.input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback){
  height: 48px;
}

</style>
