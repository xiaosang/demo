<template>
  <div>
      <!-- <div class="content-div"> -->
        <div class="content-div">
        <h1 style="text-align:center;">购 销 合 同</h1>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;">甲方： 张三</p>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;">乙方：
            <span style="display: inline-block;">
                <el-input size="mini" v-model="name"></el-input>
            </span>
        </p>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;">
            第一条、订单号码、产品规格型号、数量、单价、金额:
        </p>
        <table style="border-collapse: collapse; width: 900px; font-family: 宋体; font-size: 24px;">
            <tbody>
                <tr style="height:32px;text-align:center;font-size:24px">
                    <td style="border: 1px solid #ccc;font-weight: normal; width: 13%;text-align:center;font-size:20px;">
                        货物名称
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal; width: 10%;text-align:center;font-size:20px;">
                        品牌
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal; width: 10%;text-align:center;font-size:20px;">
                        型号规格
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal; width: 8%;text-align:center;font-size:20px;">
                        单位
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;width: 9%;text-align:center;font-size:20px;">
                        数量
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;width: 15%;text-align:center;font-size:20px;">
                        含税单价（元）
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;width: 12%;text-align:center;font-size:20px;">
                        金额（元）
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;width: 23%;text-align:center;font-size:20px;">
                        备注
                    </td>
                </tr>
                <tr style="height:32px;text-align:center;font-size:14px;text-align:center">
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        test
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        test
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        one
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        吨
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        10
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        100
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        1000
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;text-align:center;font-size:20px;">
                        无
                    </td>
                </tr>
                <tr style="height:32px;text-align:left;font-size:14px">
                    <td style="border: 1px solid #ccc;font-weight: normal;font-size:20px;" colspan="5">
                        合计人民币金额（大写）：壹仟元整
                    </td>
                    <td style="border: 1px solid #ccc;font-weight: normal;font-size:20px;" colspan="3">
                        RMB 1000
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;">
            第二条、交（提）货方式、付款方式、付款日期： <br/> &nbsp; 交（提）货 方式：买方到卖方指定仓库自提，出库费用及货权移交后的仓储费用由买方负责。<br/> &nbsp;
            付款方式：<span style="text-decoration: underline;">
                <div style="display: inline-block;">
                    <el-input size="mini" v-model="payMethod"></el-input>
                </div>
            </span>
            <br/>&nbsp;
            付款日期：<span style="text-decoration: underline;">
                <el-date-picker
                v-model="payDate"
                align="right"
                type="date"
                placeholder="选择日期"
                size="mini"
                value-format="yyyy-MM-dd"
                :picker-options="pickerOptions">
                </el-date-picker>
            </span><br/>
            第三条、 质量、包装标准：按《中华人民共和国国家标准》的规范GB/T 470-2008或按生产厂家提供的质量保证书为准。<br/>
            第四条、合理损耗标准及计算方法：允许合理磅差±2‰，超出合理磅差范围部分由买卖双方协商解决，交货尾差±5%，卖方提供相对应的生产厂出厂磅码单，按磅码单抄码重量结算。<br/>
            第五条、检验标准、方法、地点及期限：按国家标准验收。如有异议，买方须在收货七天内提出，同时买方应保存异议货品留待卖方或第三方鉴定处理。<br/>
            第六条、结算方式及期限：款到发货，买方应于提货前以电汇/汇票等方式支付全部货款；卖方开具17%增值税发票。<br/>
            第七条、违约责任：本合同受《中华人民共和国合同法》保护。买卖双方如有一方无法履行合同（不可抗力除外），由此造成的经济损失由违约方承担。遇不可抗力因素，不能履行本合同时，应及时通知对方，双方协商解决。<br/>
            第八条、合同争议的解决方式：本合同在履行过程中发生的争议，由双方当事人协商解决；协商不成任何一方均可向合同签订所在地有管辖权的人民法院提起诉讼。<br/>
            第九条、其他约定事项：本合同以传真方式签订，经双方盖章后生效，传真件与原件具有同等法律效力；与本合同有关的货权转移凭据及其传真件同具法律效力；有效期：自买卖双方签订合同之日起，至货款、发票结清之日为止。<br/>
        </p>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;text-align: right;">
            签订日期：
            <span style="text-decoration: underline;">
                <el-date-picker
                v-model="signingDate"
                align="right"
                type="date"
                placeholder="选择日期"
                size="mini"
                value-format="yyyy-MM-dd"
                :picker-options="pickerOptions">
                </el-date-picker>
            </span>
        </p>
        <p style="margin: 13px 0;font-family: 宋体;font-size: 18px;line-height: 30px;text-align: right;">
            截止日期：
            <span style="text-decoration: underline;">
                <el-date-picker
                v-model="expireDate"
                align="right"
                type="date"
                placeholder="选择日期"
                size="mini"
                value-format="yyyy-MM-dd"
                :picker-options="pickerOptions">
                </el-date-picker>
            </span>
        </p>
        <el-button icon="el-icon-close" plain :loading="loading" @click="cancel">取 消</el-button>
        <el-button icon="el-icon-check" type="primary" @click="onSubmit" :loading="loading">提 交</el-button>
        </div>
    </div>
  <!-- </div> -->
</template>

<script>
export default {
  name: 'Edit',
  data () {
    return {
      signingDate: '',
      name: '',
      payMethod: '',
      payDate: '',
      expireDate: '',
      pickerOptions: {
          shortcuts: [{
            text: '今天',
            onClick(picker) {
              picker.$emit('pick', new Date());
            }
          }, {
            text: '昨天',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit('pick', date);
            }
          }, {
            text: '一周前',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit('pick', date);
            }
          }]
      },
      loading: false,
    }
  },
  methods: {
      onSubmit() {
          if(this.name == '') {
            this.$message({
                message: '乙方不可为空',
                type: 'info'
            });
            return;
          }
          if(this.payMethod == '') {
            this.$message({
                message: '付款方式不可为空',
                type: 'info'
            });
            return;
          }
          if(this.payDate == '') {
            this.$message({
                message: '付款日期不可为空',
                type: 'info'
            });
            return;
          }
          if(this.signingDate == '') {
            this.$message({
                message: '签订日期不可为空',
                type: 'info'
            });
            return;
          }
          if(this.expireDate == '') {
            this.$message({
                message: '截止日期不可为空',
                type: 'info'
            });
            return;
          }
          this.loading = true;
          axios.post("contract/add", 
            {
                name: this.name,
                signingDate: this.signingDate,
                payMethod: this.payMethod,
                payDate: this.payDate,
                expireDate: this.expireDate
            }).then((response) => {
                this.loading = false;
                this.$message({
                    message: response.data.info,
                    type: response.data.msg
                });
            }).catch(()=>{
            this.$message({
                message: '请求失败',
                type: 'error'
            });
          });
      },
      cancel() {
          this.$router.push('/');
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .content-div {
        padding: 20px;
        background: #fff;
        width: 900px;
        margin: 0 auto;
    }
</style>
