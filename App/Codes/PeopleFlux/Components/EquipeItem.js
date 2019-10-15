
import React from 'react'
import { StyleSheet, View, Text, Image, TouchableOpacity } from 'react-native'


class EquipeItem extends React.Component {
  constructor(props) {
      super(props)
  }

  render() {

    const member=this.props.member


    return (
      <View style={styles.main_container}>
        <View style={styles.image_container}>

        </View>
        <View style={styles.content_container}>
          <View style={styles.name_container}>
            <Text style={styles.firstname_text}>{member.firstname}</Text>
            <Text style={styles.name_text}>{member.name}</Text>
          </View>
          <View style={styles.statut_container}>
            <Text style={styles.status_text}>{member.status}</Text>
          </View>
        </View>
      </View>
    )
  }
}

const styles = StyleSheet.create({
  main_container: {
    height: 190,
    flexDirection: 'row'
  },
  image_container:{

  },
  image: {
    width: 50,
    height: 50,
    margin: 5
  },
  content_container: {
    flex: 1,
    margin: 5
  },
  name_container: {
    flex: 3,
    flexDirection: 'row'
  },
  firstname_text: {
    fontWeight: 'bold',
    fontSize: 20,
    flex: 1,
    flexWrap: 'wrap',
    paddingRight: 5
  },
  name_text: {
    fontWeight: 'bold',
    fontSize: 26,
    color: '#666666'
  },
  statut_container: {
    flex: 7
  },
  status_text: {
    fontStyle: 'italic',
    color: '#666666'
  }
})

export default EquipeItem
