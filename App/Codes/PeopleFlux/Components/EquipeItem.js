import React from 'react'
import { StyleSheet, View, Text, Image, ActivityIndicator } from 'react-native'


class EquipeItem extends React.Component {

  constructor(props) {
    super(props)
    this.state = {
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


  render() {
    const equipe=this.props.equipe


    return (
      <View style={styles.main_container}>
        <View style={styles.image_container}>
        {this._displayLoading()}
          <Image
          style ={styles.image}
          source={{uri: 'https://peopleflux.gauthierbohyn.com/images/'+ equipe.picture}} />
        </View>
        <View style={styles.content_container}>
          <View style={styles.name_container}>
            <Text style={styles.firstname_text}>{equipe.firstname}</Text>
            <Text style={styles.name_text}>{equipe.name}</Text>
          </View>
          <View style={styles.statut_container}>
            <Text style={styles.status_text}>{equipe.status}</Text>
          </View>
        </View>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    height: 75,
    marginTop:5,
    flexDirection: 'row'
  },
  image_container:{
    marginLeft: 15
  },
  image: {
    width: 50,
    height: 50,
    margin: 5
  },
  content_container: {
    flex: 1,
    margin: 5,
    marginLeft:15
  },
  name_container: {
    flex: 3,
    flexDirection: 'row'
  },
  firstname_text: {
    fontSize: 20,
    color: 'white',
    height:30,
    fontWeight : 'bold',


  },
  name_text: {
    fontSize: 20,
    color: 'white',
    paddingLeft:5,
    height:30,
    fontWeight : 'bold',

  },
  statut_container: {
    flex: 7
  },
  status_text: {
    fontStyle: 'italic',
    color: '#ff5733',
    marginTop:5
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

export default EquipeItem
