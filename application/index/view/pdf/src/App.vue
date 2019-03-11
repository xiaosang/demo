<template>
  <div id="app">
        <el-container>
            <el-header>合同管理</el-header>
            <el-main>
              <router-view/>
            </el-main>
        </el-container>
    
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
html, body {
  margin: 0;
  padding: 0;
  min-height: 100%;
}
#app {
  background: #ececec;
  width: 100%;
  height: 100%;
}
.el-header {
    background-color: #B3C0D1;
    color: #333;
    text-align: left;
    line-height: 60px;
}
</style>
