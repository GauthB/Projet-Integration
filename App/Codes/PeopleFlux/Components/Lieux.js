import React, {Component} from 'react'
import { StyleSheet, View, Text, Picker } from 'react-native'
import MapboxGL from '@react-native-mapbox-gl/maps';

MapboxGL.setAccessToken('pk.eyJ1IjoidGhpYmF1dGhlcm1hbnQiLCJhIjoiY2sxejI0NGd5MGxmeTNobXZ0bmttZnI1OSJ9.qDZmXtEgBV2n5hCbUA2qow');


class Lieux extends React.Component {

  constructor(props) {
    super(props)
    this.state = { event: "" }
  }

  render() {
    return (
      <View style={styles.main_container}>
        <Text style={styles.text_lieux}>Lieux</Text>
          <View styles={styles.head_container}>
            <Text style={styles.text_evenements}>Evenements : </Text>
            <View style={styles.picker_container}>
              <Picker
                selectedValue={this.state.event}
                onValueChange={(itemValue, itemIndex) =>
                  this.setState({event: itemValue})
                }
                style={styles.picker_events}>
                <Picker.Item label="24H Vélo" value="24h" />
                <Picker.Item label="Solidarités" value="soli" />
                <Picker.Item label="Welcome Spring Festival" value="wsf" />
                <Picker.Item label="Brussels Summer Festival" value="bsf" />
              </Picker>
            </View>
          </View>

          <MapboxGL.MapView
          ref={(c) => this._map = c}
          style={{flex: 1}}
          zoomLevel={1}>
        </MapboxGL.MapView>

      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    flex: 1,
    backgroundColor: '#232531',


  },

  text_lieux:{
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
    width:200

  },
  picker_container:{

  },
  picker_events:{
    width:200,
    color:'#c70039',
    backgroundColor:'white',
    height:30,


  }
})

export default Lieux
