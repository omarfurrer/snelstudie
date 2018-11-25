<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <h3>Rules
                    <button class="btn btn-sm btn-outline-primary btn-pill ml-2" 
                            @click="create()"
                            type="button"
                            data-toggle="modal"
                            data-target="#createRuleModal">
                        <i class="fa fa-plus"></i>
                    </button>
                </h3>
            </div>
        </div>
        <div class="row">
            <div v-for="(rule,index) in sortedRules" :key="rule.id" class="col-md-3">
                <p class="rule">{{ rule.city.name }}
                    <span v-show="editIndex!=index" class="badge badge-primary badge-pill">{{ rule.rule }}</span>
                    <input
                        v-if="editIndex==index"
                        :id="'rule-'+rule.id"
                        @keydown.enter="update"
                        @keydown.esc="cancelEdit"
                        v-model="editRule.rule"
                        type="text"
                        class="form-control">
                    <i v-show="editIndex==index" class="fa fa-times-rectangle-o float-right text-danger cancel-edit" @click="cancelEdit"></i>
                    <span class="float-right">
                        <i v-show="editIndex!=index" class="fa fa-pencil-square-o edit" @click="edit(index)"></i>
                        <i v-show="editIndex!=index" class="fa fa-trash text-danger delete ml-1" @click="destroy(index)"></i>
                    </span>
                </p>
            </div>
        </div>
        <div class="modal fade" id="createRuleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="store()">
                        <div class="modal-body">
                            <div class="form-group row required">
                                <label class="col-sm-2 col-form-label" for="city_id">City</label>
                                <div class="col-sm-10">
                                    <select class="form-control" :class="{'is-invalid' : errors.has('city_id')}" id="city_id" v-model="createRule.city_id" required>
                                            <option value="" selected>Select City</option>
                                        <option v-for="(cityName,id) in citiesList" :key="id" :value="id">{{ cityName }}</option>
                                    </select>
                                    <div v-if="errors.has('city_id')" class="invalid-feedback">{{ errors.get('city_id') }}</div>
                                </div>
                            </div>
                            <div class="form-group row required">
                                <label class="col-sm-2 col-form-label" for="rule">Rule</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('rule')}" id="rule" v-model="createRule.rule" required>
                                           <div v-if="errors.has('rule')" class="invalid-feedback">{{ errors.get('rule') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Errors from '../Models/Errors.js';

    export default {
        props: ['citiesVariableId'],
        data() {
            return{
                rules: [],
                createRule: {
                    city_id: null,
                    rule: null
                },
                editIndex: null,
                editRule: null,
                citiesList: [],
                errors: new Errors()
            };
        },
        computed: {
            sortedRules() {
                return this.rules.sort(function (a, b) {
                    var nameA = a.city.name.toLowerCase(), nameB = b.city.name.toLowerCase();
                    if (nameA < nameB) //sort string ascending
                        return -1;
                    if (nameA > nameB)
                        return 1;
                    return 0; //default return value (no sorting)
                });
            }
        },
        methods: {
            create() {
                if (!this.citiesList.length) {
                    axios.get('/ajax/admin/cities/lists')
                            .then(response => {
                                this.citiesList = response.data.cities;
                            });
                }
            },
            edit(index) {
                this.editIndex = index;
                this.editRule = Object.assign({}, this.sortedRules[index]);
                // set focus to element input
                this.$nextTick(function () {
                    document.getElementById('rule-' + this.editRule.id).focus();
                }.bind(this));
            },
            store() {
                axios.post(`/ajax/admin/cities_variables/${this.citiesVariableId}/cities_variable_rules`, this.createRule)
                        .then(response => {
                            this.rules.push(response.data.citiesVariableRule);
                            this.cancelCreate();
                        })
                        .catch(error => {
                            if (error.response.status === 422) {
                                this.errors.record(error.response.data.errors);
                            }
                        });
            },
            update() {
                axios.patch(`/ajax/admin/cities_variables/${this.citiesVariableId}/cities_variable_rules/${this.editRule.id}`, this.editRule)
                        .then(response => {
                            this.rules[this.editIndex] = response.data.citiesVariableRule;
                            this.cancelEdit();
                        });
            },
            destroy(index) {
                if (confirm("Are you sure you want to delete this rule ?")) {
                    axios.delete(`/ajax/admin/cities_variables/${this.citiesVariableId}/cities_variable_rules/${this.rules[index].id}`)
                            .then(response => {
                                this.rules.splice(index, 1);
                            });
                }
            },
            cancelCreate() {
                this.createRule = {
                    city_id: null,
                    rule: null
                };
                this.errors.clear();
            },
            cancelEdit() {
                this.editIndex = null;
                this.editRule = null;
            }
        },
        mounted() {
            axios.get(`/ajax/admin/cities_variables/${this.citiesVariableId}/cities_variable_rules`)
                    .then(response => {
                        this.rules = response.data.rules;
                    });
        }
    }
</script>

<style lang="scss" scoped>
    .rule{
        border: 1px solid #f0f3f5;
        padding: 5px;
        border-radius: 10px;
        input{
            display: inline-block;
            width: 50%;
        }
        &:hover{
            .edit,.delete{
                display: inline-block;
            }
        }
    }
    i{
        cursor: pointer;
        &.edit,&.delete{
            margin-top: 5px;
            display: none;
        }
        &.cancel-edit{
            margin-top: 10px;
        }
    }
</style>
