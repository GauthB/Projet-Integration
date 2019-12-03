import React, {Component} from 'react'
import { StyleSheet, View, Text, Picker, Image, TouchableOpacity, ActivityIndicator, FlatList } from 'react-native'
import RNPickerSelect from 'react-native-picker-select';
import { connect } from 'react-redux'
import MapboxGL from "@mapbox/react-native-mapbox-gl";
import { PermissionsAndroid } from 'react-native';
import {getStages} from '../Helpers/Utils'
import {getEvents} from '../Helpers/Utils'
import {getNbrPers} from '../Helpers/Utils'
import PointItem from './PointItem'



MapboxGL.setAccessToken("pk.eyJ1IjoidGhpYmF1dGhlcm1hbnQiLCJhIjoiY2sxejI0NGd5MGxmeTNobXZ0bmttZnI1OSJ9.qDZmXtEgBV2n5hCbUA2qow");

class Lieux extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      coordonnes:[],
      dataStages:[],
      dataEvents:[],
      dataNbrPers:[],
      isLoading: true
    }
  }


  _displayLoading() {
    if (this.state.isLoading) {
      return (
        <View style={styles.loading_container}>
        <ActivityIndicator size='large' color='#c70039' />
        </View>
      )
    }
}

  _setLieu(value) {
   const action = { type: "SET_LIEU", value: value }
   this.props.dispatch(action)

 }


 ItemSelect = () => {
   let items = this.state.dataEvents.map( x => ({
      label : x.event_name,
      value: x.event_name
    }));
    return items;
 }


 getData(){
   setTimeout(() => {
     getStages().then((data) => {this.setState({dataStages :data, isLoading: false})})
     getEvents().then((data) => {this.setState({dataEvents :data, isLoading: false})})
     getNbrPers().then((data) => {this.setState({dataNbrPers :data, isLoading: false})})
    }, 1000)

 }


 componentDidMount() {

  PermissionsAndroid.requestMultiple(
             [PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION,
             PermissionsAndroid.PERMISSIONS.ACCESS_COARSE_LOCATION],
              {
                 title: 'Give Location Permission',
                 message: 'App needs location permission to find your position.'
              }
     ).then(granted => {
         console.log(granted);
     }).catch(err => {
         console.warn(err);
     });

     this.getData()



 }

 calculNbrPers(stage){

   nbrEntree =0;
   nbrSortie =0;

   for (let x=0; x < this.state.dataNbrPers.length; x++){

     if(this.state.dataNbrPers[x].id_stage == stage.id_stage){
       nbrEntree += Number(this.state.dataNbrPers[x].nbr_entree);
       nbrSortie += Number(this.state.dataNbrPers[x].nbr_sortie);
     }
   }
   return  (nbrSortie > nbrEntree) ? 0 : nbrEntree - nbrSortie;
 }



 renderAnnotation (stage) {

   return (
       <PointItem stage={stage} nbrPers={this.calculNbrPers(stage)} />
   );
 }

 centerMap(){
   var name_event = this.props.selectedLieu;
   var id_event="";

   for (let n = 0; n < this.state.dataEvents.length; n++) {

     if(this.state.dataEvents[n].event_name == name_event){
       id_event = this.state.dataEvents[n].id_event;
     }

   }

   for (let i = 0; i < this.state.dataStages.length; i++) {

     if(this.state.dataStages[i].id_event == id_event){
       return [Number(this.state.dataStages[i].stage_longitude),Number(this.state.dataStages[i].stage_latitude)];

     }

   }
   return [4.61288,50.6682];



 }

 renderAnnotations () {

    var items = [];
    var name_event = this.props.selectedLieu;
    var id_event="";
    var nbrPers=[];

    for (let n = 0; n < this.state.dataEvents.length; n++) {

      if(this.state.dataEvents[n].event_name == name_event){
        id_event = this.state.dataEvents[n].id_event;
      }

    }

    for (let i = 0; i < this.state.dataStages.length; i++) {

      if(this.state.dataStages[i].id_event == id_event){
        items.push(this.renderAnnotation(this.state.dataStages[i]));
      }
    }


    return items;
  }




  render() {

    return (
      <View style={styles.main_container}>
        <Text style={styles.text_lieu}>Lieux</Text>
            <View style={styles.picker_container}>
              <View style={styles.evenements_text_container}>
                <Text style={styles.text_evenements} >Evenements : </Text>
              </View>
              <View style={styles.pickerSelect_container}>

                <RNPickerSelect
                  style={pickerStyle}
                  onValueChange={(value) => this._setLieu(value)}
                  placeholder= {{ label: 'Selectionnez un lieu', value: null}}
                  mode="dropdown"
                  items={this.ItemSelect()}
                />
              </View>
            </View>

            <Text style={styles.lieu_selectionne}>{this.props.selectedLieu}</Text>

            <View style={styles.container_map}>
            {this._displayLoading()}

              <MapboxGL.MapView
                ref={(c) => this._map = c}
                styleURL={MapboxGL.StyleURL.Street}
                style={styles.map}
                showUserLocation ={true}
                zoomLevel={13}
                centerCoordinate={this.centerMap()}
              >

                {this.renderAnnotations()}

              </MapboxGL.MapView>

            </View>


      </View>
    )

  }
}

const pickerStyle = {
	inputIOS: {
		color: '#c70039',
    fontSize:15,
    textAlign:'center',


	},
	inputAndroid: {
		color: '#c70039',
    paddingLeft:10,
    fontSize:15,

    textAlign:'center'
	},
	placeholderColor: 'red',
	underline: { borderTopWidth: 0 },

};

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531'
  },

  text_lieu:{
    fontSize:30,
    color:'#c70039',
    marginLeft:10,
    marginTop:10
  },
  head_container:{
    flexDirection: 'row',
    flex:1
  },
  text_evenements:{
    fontSize:20,
    color:'white',
    marginLeft:10,
    marginTop:5,
    width:150

  },

  picker_container:{
    flexDirection:'row',


  },
  evenements_text_container:{
    flex:5,
    color: 'white',
    fontSize:20
  },
  pickerSelect_container:{
    flex:6,
    justifyContent:'center',
    alignItems:'center',
    color:'#c70039',
    backgroundColor:'white',
    height:30,
    borderRadius: 20,
    borderWidth: 1,
    borderColor: '#bdc3c7',
    marginTop:3,
    marginRight:50


  },
  content_container:{
    justifyContent:'center',
    alignItems:'center',
    flex:1
  },
  image:{
    height:500,
    width:350,
    marginLeft:5,
    marginTop:20
  },
  lieu_selectionne:{
    textAlign: 'center',
    marginTop: 10,
    fontSize: 30,
    color: '#ff5733'
  },

  page: {
   flex: 1,
   justifyContent: "center",
   alignItems: "center",
   backgroundColor: "#F5FCFF"
 },
 container_map: {
   flex:1,
   marginTop:5,
   marginRight:10,
   marginLeft:10,
   marginBottom:30,
   backgroundColor: "#ff5733"
 },
 map: {
   flex: 1
 },
 loading_container:{
   position: 'absolute',
 left: 0,
 right: 0,
 top: 0,
 bottom: 0,
 alignItems: 'center',
 justifyContent: 'center'
 }
})

const mapStateToProps = (state) => {
  return{
    selectedLieu: state.selectedLieu
  }
}

export default connect(mapStateToProps)(Lieux)
