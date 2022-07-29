define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
    'use strict';
    var self;
    return Component.extend({
        defaults: {
            template: 'Adobe_KnockoutExercise/knockout-add'
        },
        sum: ko.observable(0),
        initialize: function () {
            self=this;
            this.firstNo = ko.observable(0);
            this.secondNo = ko.observable(0);
            this._super();
        },

        addNumbers: function () {
            this.firstNo(Number(this.firstNo()));
            this.secondNo(Number(this.secondNo()));
            self.sum(this.firstNo() + this.secondNo());
        }
    });
}
);