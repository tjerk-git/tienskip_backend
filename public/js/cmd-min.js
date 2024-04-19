var $ = jQuery.noConflict();
$(document).ready(function (e) {
    // only init when $(".cmd-people-container") is found on the page
    if ($(".cmd-people-container").length > 0) {
        SiteManager.init();
    }
});

// wait 3 seconds and then click the button
setTimeout(function () {
    $(".js-drop-docent").click();
}, 3000);

const API_URL = "/api/people";
//const LOCAL_API_URL = "/dist/people.json";

var SiteManager = {
    nScreenWidth: 0,
    nScreenHeight: 0,
    mob: !1,
    init: function () {
        (this.mob = !!navigator.userAgent.match(/(Android|webOS|BlackBerry|IEMobile|Opera Mini|iPad|iPhone|iPod)/g)),
            (0 != window.orientation && 90 != window.orientation && -90 != window.orientation && 180 != window.orientation) || (this.mob = !0),
            PeopleManager.init(),
            PhysicsManager.init(),
            InfoPanel.init(),
            $(window).resize(this.handleStageResize.bind(this)),
            this.handleStageResize(),
            this.onUpdateStage();


    },
    handleStageResize: function () {
        console.log("handleStageResize"), (this.nScreenWidth = window.innerWidth), (this.nScreenHeight = window.innerHeight);

        this.nScreenHeight = 622;

        var e = 0.01 * this.nScreenHeight,
            t = 0.01 * this.nScreenWidth;
        document.documentElement.style.setProperty("--vw", t + "px"), document.documentElement.style.setProperty("--vh", e + "px"), InfoPanel.resetScene(), PhysicsManager.handleStageResize();
    },
    shuffleArray: function (e) {
        for (var t = e.length - 1; t > 0; t--) {
            var n = Math.floor(Math.random() * (t + 1)),
                i = e[t];
            (e[t] = e[n]), (e[n] = i);
        }
    },
    onUpdateStage: function () {
        PeopleManager.onUpdateStage(), PhysicsManager.onUpdateStage(), window.requestAnimationFrame(this.onUpdateStage.bind(this));
    },
},
    PeopleManager = {
        myContainer: $(".cmd-people-container"),
        nCurrentPersonID: 0,
        aPeople: [],
        myNewPersonBtn: $(".js-drop-docent"),
        myPeopleData: [],
        bNewButtonActive: !1,
        init: function () {

            $.getJSON(API_URL, this.onPeopleDataLoaded.bind(this)),
                SiteManager.mob ? $(".cmd-people-container").on("touchend", this.onMousedUp.bind(this)) : $(".cmd-people-container").on("mouseup", this.onMousedUp.bind(this));

            $('.filterOption').on('change', this.onFilterBoiClicked.bind(this));
        },
        activateNewButton: function () {
            this.bNewButtonActive || (this.myNewPersonBtn.on("click", this.onNewClicked.bind(this)), this.myNewPersonBtn.fadeIn(), (this.bNewButtonActive = !0));
        },
        deActivateNewButton: function () {
            this.bNewButtonActive && (this.myNewPersonBtn.off("click"), this.myNewPersonBtn.fadeOut(), (this.bNewButtonActive = !1));
        },
        onFilterBoiClicked: function (e) {

            // get selected value
            const filterValue = e.target.value;

            // get id of selected value
            const filterId = e.target.id;

            // console.log('filterId', filterId);
            // console.log('filterValue', filterValue);

            this.onNewClicked(filterId, filterValue);
        },
        onPeopleDataLoaded: function (e) {

            this.activateNewButton(), (this.myPeopleData = e), SiteManager.shuffleArray(this.myPeopleData);
            this.nCurrentPersonID = 0;


        },
        onNewClicked: function (filterId, filterValue) {
            //this.addPerson();
            this.nCurrentPersonID = 0;

            //console.log('filter clicked');
            this.clearAllPeople();

            let toDisplayPeople = this.myPeopleData;

            switch (filterId) {
                case 'member_since':
                    toDisplayPeople = toDisplayPeople.filter(function (el) {
                        return el.member_since == filterValue;
                    });
                    break;
                case 'member_fact':
                    toDisplayPeople = toDisplayPeople.filter(function (el) {
                        return el.fact == filterValue;
                    });
                    break;
                case 'member_role':
                    toDisplayPeople = toDisplayPeople.filter(function (el) {
                        return el.description == filterValue;
                    });
                    break;
                case '#':
                    toDisplayPeople = this.myPeopleData;
                    break;
                // Add more cases for other filters if needed
                default:
                    //toDisplayPeople = this.myPeopleData;
                    break;
            }

            console.log(toDisplayPeople);


            for (var i = 0; i < toDisplayPeople.length; i++) {
                this.addPerson();
            }

        },
        addPerson: function () {
            var e = "circle";
            this.myContainer.append('<div id="cmd-person-' + this.nCurrentPersonID + '" class="cmd-person --' + 'circle"></div>');
            var t = $("#cmd-person-" + this.nCurrentPersonID);
            this.aPeople.push({ id: this.nCurrentPersonID, div: t, body: PhysicsManager.addPersonPhysicsObject(e) }),
                console.log("this.myPeopleData[this.nCurrentPersonID]", this.myPeopleData[this.nCurrentPersonID], this.myPeopleData, this.nCurrentPersonID);
            var n = this.myPeopleData[this.nCurrentPersonID].email;
            t.css({ backgroundImage: 'url("' + this.myPeopleData[this.nCurrentPersonID].avatar })
            n &&
                SiteManager.mob ? t.on("touchstart", this.onPersonClicked.bind(this)) : t.on("mousedown", this.onPersonClicked.bind(this)),
                this.nCurrentPersonID++,
                this.nCurrentPersonID == this.myPeopleData.length && this.deActivateNewButton();
        },
        onPersonClicked: function (e) {
            console.log("e.currentTarget.id.substring(11)", e.currentTarget.id.substring(11)), console.log("d", this.myPeopleData[e.currentTarget.id.substring(11)]), InfoPanel.showInfo(this.myPeopleData[e.currentTarget.id.substring(11)]);
        },
        onMousedUp: function () {
            InfoPanel.hideInfo();
        },
        clearAllPeople: function () {

            $(".cmd-person").off("mousedown"),
                this.myContainer.html(""),
                0 == this.myPeopleData.length ? this.deActivateNewButton() : this.activateNewButton(),
                (this.nCurrentPersonID = 0),
                (this.aPeople = []);
        },
        onUpdateStage: function () {
            for (var e = 0; e < this.aPeople.length; e++) this.aPeople[e].div.css({ left: this.aPeople[e].body.position.x, top: this.aPeople[e].body.position.y, transform: "rotate(" + this.aPeople[e].body.angle + "rad)" });
        },
    },


    PhysicsManager = {
        FLOOR_HEIGHT: 1e3,
        WALL_WIDTH: 1e3,
        engine: null,
        world: null,
        aWallsAndFloor: [],
        mouseConstraint: null,
        nResizeTimeoutID: null,
        init: function () {
            (this.engine = Matter.Engine.create()),
                (this.world = this.engine.world),
                (this.mouseConstraint = Matter.MouseConstraint.create(this.engine, { mouse: Matter.Mouse.create(document.querySelector(".cmd-people-container")) })),
                Matter.Composite.add(this.world, this.mouseConstraint);
        },
        addPersonPhysicsObject: function (e) {
            var t,
                n = 6;
            switch ((SiteManager.nScreenWidth <= 640 && SiteManager.nScreenWidth < SiteManager.nScreenHeight && (n = 16), e)) {
                case "circle":
                    t = Matter.Bodies.circle((0.3 + 0.4 * Math.random()) * SiteManager.nScreenWidth, -100, Math.floor((n / 200) * SiteManager.nScreenWidth));
                    break;
                case "square":
                    t = Matter.Bodies.rectangle((0.3 + 0.4 * Math.random()) * SiteManager.nScreenWidth, -100, Math.floor((n / 100) * SiteManager.nScreenWidth), Math.floor((n / 100) * SiteManager.nScreenWidth));
            }
            return (t.friction = 0.05), (t.frictionAir = 0.005), (t.restitution = 0.7), Matter.Composite.add(this.world, [t]), t;
        },
        resizeRender: function () {
            (this.render.bounds.max.x = SiteManager.nScreenWidth),
                (this.render.bounds.max.y = SiteManager.nScreenHeight),
                (this.render.options.width = SiteManager.nScreenWidth),
                (this.render.options.height = SiteManager.nScreenHeight),
                (this.render.canvas.width = SiteManager.nScreenWidth),
                (this.render.canvas.height = SiteManager.nScreenHeight);
        },
        resetScene: function () {
            this.aWallsAndFloor.length > 0 && (Matter.Composite.remove(this.world, this.aWallsAndFloor), (this.aWallsAndFloor = []));
            var e = Matter.Bodies.rectangle(SiteManager.nScreenWidth / 2, SiteManager.nScreenHeight + this.FLOOR_HEIGHT / 2, SiteManager.nScreenWidth, this.FLOOR_HEIGHT, { isStatic: !0 }),
                t = Matter.Bodies.rectangle(-0.5 * this.WALL_WIDTH, -1 * SiteManager.nScreenHeight, this.WALL_WIDTH, 4 * SiteManager.nScreenHeight, { isStatic: !0 }),
                n = Matter.Bodies.rectangle(SiteManager.nScreenWidth + 0.5 * this.WALL_WIDTH, -1 * SiteManager.nScreenHeight, this.WALL_WIDTH, 4 * SiteManager.nScreenHeight, { isStatic: !0 });
            this.aWallsAndFloor.push(e), this.aWallsAndFloor.push(t), this.aWallsAndFloor.push(n), Matter.Composite.add(this.world, this.aWallsAndFloor);
            for (var i = 0; i < PeopleManager.aPeople.length; i++) Matter.World.remove(this.world, [PeopleManager.aPeople[i].body]);
            PeopleManager.clearAllPeople();
        },
        handleStageResize: function () {
            window.clearTimeout(this.nResizeTimeoutID), (this.nResizeTimeoutID = window.setTimeout(this.onNowHandleResize.bind(this), 500)), this.onNowHandleResize();
        },
        onNowHandleResize: function () {
            this.resetScene();
        },
        onUpdateStage: function () {
            Matter.Engine.update(this.engine);
        },
    },
    InfoPanel = {
        myPanel: $(".cmd-info-panel"),
        myNameSection: $(".js-teacher-name"),
        myInfoSection: $(".js-teacher-info"),
        myMemberYear: $(".js-teacher-year"),
        myMemberFact: $(".js-teacher-fact"),
        myAvatar: $(".js-teacher-avatar"),
        bIsShowing: !1,
        oCurrentData: null,
        bIsInTransition: !1,
        init: function () { },
        resetScene: function () {
            this.bIsShowing && (this.myPanel.removeClass("--show"), this.myNameSection.html(""), this.myInfoSection.html(""), this.myMemberYear.html(""), this.myMemberFact.html(""), this.myAvatar.html(""), (this.bIsShowing = !1), (this.bIsInTransition = !1));
        },
        showInfo: function (e) {
            this.bIsInTransition ||
                ((this.oCurrentData = e),
                    (this.bIsInTransition = !0),
                    console.log("showinfo"),
                    this.bIsShowing ? (this.myPanel.addClass("--hide"), this.myPanel.removeClass("--show"), window.setTimeout(this.switchToNextPerson.bind(this), 200)) : this.showNewPersonInfo());
        },
        hideInfo: function () {
            this.bIsInTransition ||
                (this.bIsShowing &&
                    ((this.bIsInTransition = !0), console.log("hideInfo"), this.myPanel.addClass("--hide"), this.myPanel.removeClass("--show"), (this.bIsShowing = !1), window.setTimeout(this.hideInfoComplete.bind(this), 200)));
        },
        hideInfoComplete: function () {
            this.myPanel.removeClass("--hide"), (this.bIsInTransition = !1), console.log("hideInfoComplete");
        },
        switchToNextPerson: function () {
            this.myPanel.removeClass("--hide"), window.setTimeout(this.showNewPersonInfo.bind(this), 50);
        },
        showNewPersonInfo: function () {
            this.myPanel.addClass("--show"),
                this.myNameSection.html(this.oCurrentData.name ? this.oCurrentData.name.toUpperCase() : ""),
                this.myInfoSection.html("rol: " + (this.oCurrentData.description ? this.oCurrentData.description : "")),
                this.myMemberYear.html("lid sinds: " + (this.oCurrentData.member_since ? this.oCurrentData.member_since : "")),
                this.myMemberFact.html("feitje: " + (this.oCurrentData.fact ? this.oCurrentData.fact : "")),
                this.myAvatar.html("<img src='" + (this.oCurrentData.avatar ? this.oCurrentData.avatar : "") + "'>"),
                (this.bIsShowing = !0),
                (this.bIsInTransition = !1),
                console.log("showNewPersonInfo");
        },

    };

// filterButton.click(function () {
//     const filteredData = SiteManager.filterArray(PeopleManager.myPeopleData);
//     PeopleManager.clearAllPeople();
//     PeopleManager.myPeopleData = filteredData;
//     // Trigger people loading as if it were fresh data
//     PeopleManager.onPeopleDataLoaded({ data: filteredData });
// });
//# sourceMappingURL=cmd-min.js.map
