import React from 'react'
import { StyleSheet, View, Text, Platform, TouchableOpacity, Image } from 'react-native'
import MapboxGL from "@mapbox/react-native-mapbox-gl";


class PointItem extends React.Component {


  render() {
    const stage = this.props.stage
    const nbrPers = this.props.nbrPers

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
          <MapboxGL.Callout title={stage.stage_name + "\n" + nbrPers + "/" + stage.max_people }/>
       </MapboxGL.PointAnnotation>
    )
  }
}

const styles = StyleSheet.create({})

export default PointItem
