import React from 'react'
import { StyleSheet, View, Text, Platform, TouchableOpacity, Image } from 'react-native'
import MapboxGL from "@mapbox/react-native-mapbox-gl";


class PointItem extends React.Component {


  render() {
    const stage = this.props.stage
    console.log(stage.stage_name);

    return (
      <MapboxGL.PointAnnotation
        key={stage.id_stage}
        id={stage.id_stage}
        title=''
        coordinate={[Number(stage.stage_longitude), Number(stage.stage_latitude)]}>

        <Image
        source={require('../Images/marker.png')}
        style={{
          flex: 1,
          resizeMode: 'contain',
          width: 50,
          height: 50
          }}/>
          <MapboxGL.Callout title={stage.stage_name}/>
       </MapboxGL.PointAnnotation>
    )
  }
}

const styles = StyleSheet.create({})

export default PointItem
