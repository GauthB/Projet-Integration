import React, {Component} from 'react'
import { StyleSheet, View, Text, Picker, Image, TouchableOpacity } from 'react-native'
import RNPickerSelect from 'react-native-picker-select';
import { connect } from 'react-redux'
import MapboxGL from "@react-native-mapbox-gl/maps";


MapboxGL.setAccessToken("pk.eyJ1IjoidGhpYmF1dGhlcm1hbnQiLCJhIjoiY2sxejI0NGd5MGxmeTNobXZ0bmttZnI1OSJ9.qDZmXtEgBV2n5hCbUA2qow");

const coordonnes = [
  4.61288,50.6682
];

class Lieux extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
      coordonnes:coordonnes
    }

  }

  _setLieu(value) {
   const action = { type: "SET_LIEU", value: value }
   this.props.dispatch(action)
 }
 componentDidUpdate(){
   console.log(this.props.selectedLieu)
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
                  items={[
                    { label: '24h Vélo', value: '24h vélo' },
                    { label: 'Solidarité', value: 'Solidarité' },
                    { label: 'Welcome Spring Festival', value: 'Welcome Spring Festival' },
                    { label: 'BFS', value: 'BFS' },
                  ]}
                />
              </View>
            </View>

            <Text style={styles.lieu_selectionne}>{this.props.selectedLieu}</Text>

            <View style={styles.container_map}>
              <MapboxGL.MapView
                ref={(c) => this._map = c}
                style={styles.map}
              >
                <MapboxGL.Camera
                  zoomLevel={14}
                  centerCoordinate={this.state.coordonnes}
                />

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
 }
})

const mapStateToProps = (state) => {
  return{
    selectedLieu: state.selectedLieu
  }
}

export default connect(mapStateToProps)(Lieux)
