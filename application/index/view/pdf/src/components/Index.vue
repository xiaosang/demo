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
                prop="signing_date"
                label="签订日期">
                <template slot-scope="scope">
                    {{ dateFtt('yyyy-MM-dd',scope.row.signing_date) }}
                </template>
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
                <template slot-scope="scope">
                    {{ dateFtt('yyyy-MM-dd',scope.row.pay_date) }}
                </template>
            </el-table-column>
            <el-table-column
            align="center"
                prop="expire_date"
                label="截止日期">
                <template slot-scope="scope">
                    {{ dateFtt('yyyy-MM-dd',scope.row.expire_date) }}
                </template>
            </el-table-column>
            <el-table-column
            fixed="right"
            label="操作"
            width="50">
            <template slot-scope="scope">
                <el-button @click="show(scope.row.id)" type="text" size="small">查看</el-button>
            </template>
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
            :total="pagination.total">
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
          page: 1,
          total: 0,
      }
    }
  },
  methods: {
        dateFtt(fmt,time) {
            let date = new Date(time * 1000);
            var o = {   
                "M+" : date.getMonth()+1,                 //月份
                "d+" : date.getDate(),                    //日
                "h+" : date.getHours(),                   //小时
                "m+" : date.getMinutes(),                 //分
                "s+" : date.getSeconds(),                 //秒
                "q+" : Math.floor((date.getMonth()+3)/3), //季度
                "S"  : date.getMilliseconds()             //毫秒
            };   
            if(/(y+)/.test(fmt))
                fmt=fmt.replace(RegExp.$1, (date.getFullYear()+"").substr(4 - RegExp.$1.length));   
            for(var k in o)
                if(new RegExp("("+ k +")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
            return fmt;
        },
      handleSizeChange(val) {
          this.pagination.pageSize = val;
      },
      handleCurrentChange(val) {
          this.pagination.page = val;
      },
      getList() {
          this.loading = true;
          axios.get("contract/get", this.pagination).then((response) => {
                this.loading = false;
                this.tableData = response.data.info.data;
                this.pagination.total = response.data.info.total;
            }).catch(()=>{
            this.$message({
                message: '请求失败',
                type: 'error'
            });
          });
      },
      show(index) {
          window.location.href = '/show/' + index;
      },
      add() {
          this.$router.push('/edit');
      }
  },
  mounted: function() {
      this.getList();
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
