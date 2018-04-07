<template>
  <div class="home">
    我是home
    <!-- 导航 -->
        <nav class="main">
            <section>
                <router-link to="/home">首页</router-link>
            </section>
            <section>
                <router-link to="/user">我的</router-link>
            </section>
        </nav>
  </div>
</template>

<script>
export default {
  name: 'hello',
  data () {
    return {
      msg: 'Welcome to BeiJing',
      name: 'xiaoming'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
