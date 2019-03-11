<template>
  <div>
        <div class="list">
            <el-button icon="el-icon-plus" type="primary" @click="add" plain :loading="loading">新 建</el-button>

            <el-table
            :data="tableData"
            style="width: 100%;margin-top: 20px;" v-loading="loading">
            <el-table-column
            align="center"
            type="index"
            width="50">
            </el-table-column>
            <el-table-column
                align="center"
                prop="name"
                label="乙方">
            </el-table-column>
            <el-table-column
            align="center"
                prop="signing_data"
                label="签订日期">
            </el-table-column>
            <el-table-column
            align="center"
                prop="pay_method"
                label="付款方式">
            </el-table-column>
            <el-table-column
            align="center"
                prop="pay_date"
                label="付款日期">
            </el-table-column>
            <el-table-column
            align="center"
                prop="expire_date"
                label="截止日期">
            </el-table-column>
            </el-table>

            <el-pagination
            class="page-div"
            background
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :page-sizes="[100, 200, 300, 400]"
            :page-size="pagination.pageSize"
            :current-page="pagination.page"
            layout="total, sizes, prev, pager, next"
            :total="1000">
</el-pagination>
        </div>
  </div>
</template>

<script>
export default {
  name: 'Index',
  data () {
    return {
      tableData: [],
      loading: false,
      pagination: {
          pageSize: 100,
          page: 1
      }
    }
  },
  methods: {
      handleSizeChange(val) {
          this.pagination.pageSize = val;
      },
      handleCurrentChange(val) {
          this.pagination.page = val;
      },
      getList() {
          this.loading = true;
          axios.post("http://www.baidu.com", 
            {
                signingData: this.signingData,
                payMethod: this.payMethod,
                payData: this.payData
            }).then((response) => {
                this.loading = false;
            }).catch(()=>{
            this.$message({
                message: '请求失败',
                type: 'error'
            });
          });
      },
      add() {
          this.$router.push('/edit');
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.list {
    width: 900px;
    margin: 0 auto;
}
.page-div {
    margin-top: 20px;
}
</style>
