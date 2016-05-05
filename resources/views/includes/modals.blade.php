<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ligro.js')}}"></script>


<!--MODAL STARTS HERE // USER DETAIL INFORMATION DIALOG-->
    <div class="modal fade" id="userDetailInformation" tabindex="-1" role="dialog" aria-labelledby="userDetailInformation" aria-hidden="true" data-target="userDetailInformation">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Хувийн мэдээлэл</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                   <div class="row">
                                    <div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Хэрэглэгчийн код</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      </div>
                                      <div class="clearfix"></div>    
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Овог</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Нэр</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Регистрийн №</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Банк</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Дансны дугаар</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Гэрийн хаяг</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Цахим шуудан</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <label>Утасны дугаар</label>
                                      </div>
                                      <div class="col-md-8 vertical-centered-label">
                                        <label for="name" class="text-info">AA00000000</label>
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                  </form>
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                                <button type="button" class="btn btn-green controls" id="information-edit">Засах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD MONEY FROM CEO DIALOG-->
    <div class="modal fade" id="addMoneyfromCEO" tabindex="-1" role="dialog" aria-labelledby="addMoneyfromCEO" aria-hidden="true" data-target="addMoneyfromCEO">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Мөнгө оруулах</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгөний хэмжээ</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>100,000₮</label>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="checkbox" name="toggle" id="toggle" style="display: none;" />
                                        <label for="toggle" class="vertical-centered-label"></label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="number" class="input-default" style="width: 100%">
                                      </div>
                                      <div class="clearfix"></div>
                                      <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Дансан дахь бэлэн мөнгө</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label>100,000₮</label>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ADD ADMIN FROM CEO DIALOG-->
    <div class="modal fade" id="AddAdmin" tabindex="-1" role="dialog" aria-labelledby="AddAdmin" aria-hidden="true" data-target="AddAdmin">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Админ нэмэх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-3 vertical-centered-label">
                                        <label>Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="text" class="input-search" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-4 vertical-centered-label">
                                        <button type="button" class="btn btn-green"><i class="fa fa-plus"> Нэмэх</i></button>
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Хэрэглэгчийн код</th>
                                          <th width="40%">Овог, нэр</th>
                                          <th width="5%"> </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Tiger</td>
                                          <td>Nixon</td>
                                          <td style="text-align: center; vertical-align: middle; font-size: 15px"><a href="#" class="fa fa-trash"></a></td>
                                        </tr>
                                        <tr>
                                          <td>Garrett</td>
                                          <td>Winters</td>
                                          <td style="text-align: center; vertical-align: middle; font-size: 15px"><a href="#" class="fa fa-trash"></a></td>
                                        </tr>
                                        <tr>
                                          <td>Ashton</td>
                                          <td>Cox</td>
                                          <td style="text-align: center; vertical-align: middle; font-size: 15px"><a href="#" class="fa fa-trash"></a></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // MAKE ACTIVATION FROM ALL USERS DIALOG-->
    <div class="modal fade" id="MakeSponsor1" tabindex="-1" role="dialog" aria-labelledby="MakeSponsor1" aria-hidden="true" data-target="MakeSponsor1">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Спонсорлох</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Спонсор сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Түвшинбат Гансүх" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>    
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Идэвхижүүлэх хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Хэрэглэгчийн код, Овог, Нэр ..." style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-check"></i> Идэвхижүүлэх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // TRANSACTION DIALOG-->
    <div class="modal fade" id="UserTrans" tabindex="-1" role="dialog" aria-labelledby="UserTrans" aria-hidden="true" data-target="UserTrans">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Мөнгө шилжүүлэх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Хэрэглэгч сонгох</label>
                                      </div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <input type="text" class="input-default" placeholder="Түвшинбат Гансүх" style="width: 100%;">
                                      </div>
                                    </div>
                                    <div class="clearfix"></div>   
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="40%">Данс</th>
                                          <th width="30%">Дансан дахь үлдэгдэл</th>
                                          <th width="30%">Шилжүүлэг хийх дүн</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>Урамшуулал</td>
                                          <td>100,000₮</td>
                                          <td contenteditable="true"></td>
                                        </tr>
                                        <tr>
                                          <td>Шагнал</td>
                                          <td>300,000₮</td>
                                          <td contenteditable="true"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="clearfix"></div> 
                                    <div>
                                      <div class="col-md-6 vertical-centered-label">
                                        <label style="padding-left: 10px">Тан код оруулах</label>
                                      </div>
                                      <div class="col-md-5 vertical-centered-label">
                                        <input type="text" class="input-default" style="width: 90%;">
                                      </div>
                                      <div class="col-md-1 vertical-centered-label">
                                        <label class="fa fa-key" style="vertical-align: middle; text-align: left;"></label>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-envelope-o"></i> Илгээх</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // CHANGE BONUS DIALOG-->
    <div class="modal fade" id="ChangeBonus" tabindex="-1" role="dialog" aria-labelledby="ChangeBonus" aria-hidden="true" data-target="ChangeBonus">
      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Урамшууллын мөнгөн дүн өөрчлөх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div>
                                    <form>
                                      <select class="ChooseCombo">
                                        <option>Анхан шат</option>
                                        <option>Ахьсан шат</option>
                                      </select>
                                    </form>
                                    </div>
                                    <div class="clearfix"></div>   
                                    <ul class="nav nav-tabs" style="margin-left: 10px; margin-right: 10px;">
                                      <li class="active"><a data-toggle="tab" href="#firstStep">1р шат - Хамтрах шат</a></li>
                                      <li><a data-toggle="tab" href="#secondStep">2р шат - Өсөх</a></li>
                                      <li><a data-toggle="tab" href="#thirdStep">3р шат - Баяжих</a></li>
                                      <li><a data-toggle="tab" href="#thirdStep">Менежер</a></li>
                                    </ul>
                                    <div class="tab-content">
                                      <div id="firstStep" class="tab-pane fade in active">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="secondStep" class="tab-pane fade">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                      <div id="thirdStep" class="tab-pane fade">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th width="40%">Урамшууллын нэр</th>
                                              <th width="30%">Мөнгөн дүн</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Ахлагчийн урамшуулал</td>
                                              <td contenteditable="true" class="editable">144000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Дэвших урамшуулал</td>
                                              <td contenteditable="true" class="editable">276000₮</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Блокын урамшуулал</td>
                                            </tr>
                                            <tr>
                                              <td>0 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>1 хүн</td>
                                              <td contenteditable="true" class="editable">5000₮</td>
                                            </tr>
                                            <tr>
                                              <td>2 хүн</td>
                                              <td contenteditable="true" class="editable">7000₮</td>
                                            </tr>
                                            <tr>
                                              <td>Ахлах</td>
                                              <td contenteditable="true" class="editable">24000₮</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-green"><i class="fa fa-save"></i> Хадгалах</button>
                              </div>
                            </div>
                          </div>
    </div>
    <!--MODAL ENDS HERE-->
    <!--MODAL STARTS HERE // ACCOUNT DETAIL-->
    <div class="modal fade" id="AccountDetail" tabindex="-1" role="dialog" aria-labelledby="AccountDetail" aria-hidden="true" data-target="AccountDetail">
      <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Гүйлгээний түүх</h4>
                              </div>
                              <div class="modal-body">
                                <form class="reg-modal form-group" >
                                  <div class="row">
                                    <div  class="col-md-4">
                                      <div class="container">
                                        <div class="row">
                                            <div class='col-sm-6'>
                                                <input type='text' class="form-control" id='datetimepicker4' />
                                            </div>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker4').datetimepicker();
                                                });
                                            </script>
                                        </div>
                                      </div>
                                    </div>
                                    <div  class="col-md-4">
                                      <input type="text" class="input-search AccountDetails" placeholder="Дансны нэр, Гүйлгээний утга, Харьцсан дансны нэр">
                                    </div>
                                    <div  class="col-md-4">
                                    <form>
                                      <select class="ChooseCombo">
                                        <option>Бүх данс</option>
                                        <option>Бэлэн мөнгөний данс</option>
                                        <option>Урамшуулалын данс</option>
                                        <option>Шагналын данс</option>
                                        <option>Хэрэглээний данс</option>
                                        <option>Хуримтлалын данс</option>
                                      </select>
                                    </form>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap table-admin" cellspacing="0" width="100%">
                                      <thead>
                                        <tr>
                                          <th width="5%">Гүйлгээний огноо</th>
                                          <th width="15%">Дансны нэр</th>
                                          <th width="30%">Гүйлгээний утга</th>
                                          <th width="20%">Харьцсан дансны нэр</th>
                                          <th width="10%">Орлого</th>
                                          <th width="10%">Зарлага</th>
                                          <th width="10%">Үлдэгдэл</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>16/04/15</td>
                                          <td>Урамшуулал</td>
                                          <td>Бат - Хэрэглэгчээс</td>
                                          <td>Бусад</td>
                                          <td>100,000₮</td>
                                          <td></td>
                                          <td>100,000₮</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
    </div>